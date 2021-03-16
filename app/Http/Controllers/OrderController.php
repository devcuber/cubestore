<?php

namespace App\Http\Controllers;

use App\Models\Order;
use App\Models\Order_Line;
use App\Models\Order_status_history;
use App\Models\Client;
use App\Models\Product;

use App\Models\Status;
use Illuminate\Http\Request;

class OrderController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $orders = Order::where('is_active',true)->get();

        $orders = $orders ->filter(function( Order $order){
            return $order->GetStatus->priority > 0;
        });
        $orders = $orders ->sortBy(function( Order $order){
            return $order->GetStatus->priority * -1;
        });
        return view('order.index' , ['orders' => $orders] );
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('order.create' );
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        /*TODO
        - la funcion debe regresar a la pantalla anterior con mensaje de guardado con exito
        - faltan validaciones
        - falta control de excepciones
        - calcular numero de orden
        */

        $order = new order;
        $order->SetOrderCode();
        $order->client_id        = $request->client_id;
        $order->shipping_info_id = $request->shipping_info_id;
        $order->comment          = $request->comment;
        $order->save();

        $bor_status_id = Status::firstwhere([['category','order'],['code','BOR']])->id;

        $order_status = new Order_status_history;
        $order_status->order_id  = $order->id;
        $order_status->status_id = $bor_status_id;
        $order_status->comment   = 'Orden creada';

        $order_status->save();

        //return back();
        return view('order.edit' , ['order' => $order] );
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Order  $order
     * @return \Illuminate\Http\Response
     */
    public function show(Order $order)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Order  $order
     * @return \Illuminate\Http\Response
     */
    public function edit(Order $order)
    {
        return view('order.edit' , [
            'order' => $order
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Order  $order
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Order $order)
    {
        /*TODO
        - la funcion debe regresar a la pantalla anterior con mensaje de guardado con exito
        - faltan validaciones
        - falta control de excepciones
        */

        $order->client_id        = $request->client_id;
        $order->shipping_info_id = $request->shipping_info_id;
        $order->comment          = $request->comment;
        $order->update();

        return back();
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Order  $order
     * @return \Illuminate\Http\Response
     */
    public function destroy(Order $order)
    {
        /*TODO
        - la funcion debe regresar a la pantalla anterior con mensaje de guardado con exito
        - faltan validaciones
        - falta control de excepciones
        */
        dd('usar la funcion de changue status');
        $can_status_id = Status::firstwhere([['category','order'],['code','CAN']])->id;

        $order_status = new Order_status_history;
        $order_status->order_id  = $order->id;
        $order_status->status_id = $can_status_id;
        $order_status->comment   = 'Orden cancelada';

        $order_status->save();
        return back();
    }

    public function chooseclient(Order $order)
    {
        $clients = Client::where('is_active',true)
                            ->orderBy('id', 'DESC')
                            ->get();
        //return view('order.chooseclient' , ['clients' => $clients ,'order' => $order  ] );
        return view('client.index' , ['clients' => $clients ,'order' => $order  ] );
    }

    public function setclient(Request $request, Order $order)
    {
        $order->client_id        = (int)$request->client_id;
        $order->shipping_info_id = Client::find($order->client_id)->GetShippingInfoid;
        $order->update();
        return view('order.edit' , ['order' => $order] );
    }

    public function chooseshippinginfo(Order $order)
    {
        return view('client.edit' , ['order' => $order , 'client' => $order->client] );
        //return view('order.chooseshippinginfo' , ['order' => $order , 'client' => $order->client] );
    }

    public function setshippinginfo(Request $request, Order $order)
    {
        $order->shipping_info_id = (int)$request->ShippingInfoid;
        $order->update();
        return view('order.edit' , ['order' => $order] );
    }

    public function chooseproduct(Order $order)
    {
        $products = Product::where('is_active',true)
        ->orderBy('id', 'DESC')
        ->get();

        //return view('order.chooseproduct' , ['order' => $order , 'products' => $products] );
        return view('product.catalogue' , ['order' => $order , 'products' => $products] );
    }

    public function setproduct(Request $request, Order $order)
    {
        $product = Product::find($request->product_id);
        $order_line = new Order_Line;
        $order_line->order_id       = $order->id;
        $order_line->product_id     = $product->id;
        $order_line->quantity       = 1;
        $order_line->unit_price     = $product->price;
        $order_line->comment        = null;
        $order_line->save();
        return view('order.edit' , ['order' => $order] );
    }

    public function ChangeStatus(Request $request, Order $order)
    {

        $status = Status::where('code' , $request->NextStatusCode)->first();

        if ($status -> exec_function){
            $this->Pay($order);
            //call_user_func('this::'.$status -> exec_function, $order);
        }

        $order_status = new Order_status_history;
        $order_status->order_id  = $order->id;
        $order_status->status_id = $status->id;
        $order_status->comment   = $status->description;
        $order_status->save();

        return back();
    }

    public function Pay(Order $order)
    {
        foreach ($order->order_lines as $order_line) {
            $product = $order_line->product;
            $product->available = $product->available - $order_line-> quantity;
            $product->update();
        }
    }

}
