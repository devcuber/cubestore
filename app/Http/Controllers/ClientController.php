<?php

namespace App\Http\Controllers;

use App\Models\Client;
use App\Models\Shipping_information;
use Illuminate\Http\Request;

class ClientController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $clients = Client::where('is_active',true)
                            ->orderBy('id', 'DESC')
                            ->get();
        return view('Client.index' , ['clients' => $clients] );
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('client.create' );
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
        */
        $client = new client;
        $client->name     = $request->name;
        $client->phone    = $request->phone;
        $client->save();

        $shipping_info = new Shipping_information;
        $shipping_info->name_holder = $client->name;
        $shipping_info->phone       = $client->phone;
        $shipping_info->city        = 'CIUDAD';
        $shipping_info->address     = 'ADDRESS';
        $shipping_info->client_id   = $client->id;
        $shipping_info->is_default  = true;
        $shipping_info->save();
        return back();
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Client  $client
     * @return \Illuminate\Http\Response
     */
    public function show(Client $client)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Client  $client
     * @return \Illuminate\Http\Response
     */
    public function edit(Client $client)
    {
        return view('client.edit' , ['client' => $client] );
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Client  $client
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Client $client)
    {
        /*TODO
        - la funcion debe regresar a la pantalla anterior con mensaje de guardado con exito
        - faltan validaciones
        - falta control de excepciones
        */
        $client->name     = $request->name;
        $client->phone    = $request->phone;
        $client->update();
        return back();
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Client  $client
     * @return \Illuminate\Http\Response
     */
    public function destroy(Client $client)
    {
        /*TODO
        - la funcion debe regresar a la pantalla anterior con mensaje de guardado con exito
        - faltan validaciones
        - falta control de excepciones
        */

        $client->is_active=false;
        $client->update();
        return back();
    }

    public function ClientDropdownlist()
    {
        $clients = Client::where('is_active',true)
                            ->orderBy('id', 'DESC')
                            ->get();
        return view('Client.dropdownlist' , ['clients' => $clients] );
    }


}
