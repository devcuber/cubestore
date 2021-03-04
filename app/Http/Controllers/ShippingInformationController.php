<?php

namespace App\Http\Controllers;

use App\Models\Shipping_information;
use App\Models\Client;
use Illuminate\Http\Request;

class ShippingInformationController extends Controller
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

        $client = Client::find($request->client_id);


        foreach($client->Shipping_Informations()->get() as $shipping_info){
            $shipping_info->is_default=false;
            $shipping_info->update();
        }

        $shipping_info = new Shipping_information;

        $shipping_info->name_holder = $request->name_holder;
        $shipping_info->phone       = $request->phone;
        $shipping_info->city        = $request->city;
        $shipping_info->address     = $request->address;
        $shipping_info->client_id   = $client->id;
        $shipping_info->is_default  = true;

        $shipping_info->save();

        return back();
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Shipping_information  $shipping_information
     * @return \Illuminate\Http\Response
     */
    public function show(Shipping_information $shipping_information)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Shipping_information  $shipping_information
     * @return \Illuminate\Http\Response
     */
    public function edit(Shipping_information $shipping_information)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Shipping_information  $shipping_information
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Shipping_information $shipping_information)
    {
        //$client = Client::find($request->client_id);
        $client = $shipping_information->client()->first();

        // dd($shipping_information->name_holder);

        if ($request->is_default)
        {
            foreach($client->Shipping_Informations()->get() as $shipping_info_row){
                $shipping_info_row->is_default=false;
                $shipping_info_row->update();
            }
        }

        $shipping_information->name_holder = $request->name_holder;
        $shipping_information->phone       = $request->phone;
        $shipping_information->city        = $request->city;
        $shipping_information->address     = $request->address;
        $shipping_information->is_default  = isset($request->is_default);

        $shipping_information->update();

        return back();
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Shipping_information  $shipping_information
     * @return \Illuminate\Http\Response
     */
    public function destroy(Shipping_information $shipping_information)
    {
        $shipping_information->is_active = false;
        $shipping_information->update();
        return back();
        //
    }
}
