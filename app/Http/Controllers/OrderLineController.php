<?php

namespace App\Http\Controllers;

use App\Models\Order_Line;
use Illuminate\Http\Request;

class OrderLineController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Order_Line  $order_Line
     * @return \Illuminate\Http\Response
     */
    public function show(Order_Line $order_Line)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Order_Line  $order_Line
     * @return \Illuminate\Http\Response
     */
    public function edit(Order_Line $order_Line)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Order_Line  $order_Line
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Order_Line $order_line)
    {
        $order_line->quantity    = $request->quantity;
        $order_line->unit_price  = $request->unit_price;
        $order_line->comment     = $request->comment;
        $order_line->update();
        return view('order.edit' , ['order' => $order_line->order] );
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Order_Line  $order_Line
     * @return \Illuminate\Http\Response
     */
    public function destroy(Order_Line $order_Line)
    {
        //
    }
}
