<?php

namespace App\Http\Controllers;

use App\Models\Product;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $products = Product::orderBy('id','DESC')->get();
        return view('product.index' , ['products' => $products] );
    }
    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        return view('product.create' );
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $product = new Product;
        $product->code      = $request->code;
        $product->option    = $request->option;
        $product->name      = $request->name;
        $product->seller    = $request->seller;
        $product->price     = $request->price;
        $product->cost      = $request->cost;
        $product->category  = $request->category;
        $product->available = $request->available;
        $product->is_deprecated = isset($request->is_deprecated);
        $product->save();
        return back();
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function show(Product $product)
    {
        return('show');
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function edit(Product $product)
    {
        return view('product.edit' , ['product' => $product] );
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Product $product)
    {
        $product->code          = $request->code;
        $product->option        = $request->option;
        $product->name          = $request->name;
        //$product->seller      = $request->seller;
        $product->price         = $request->price;
        $product->cost          = $request->cost;
        //$product->image       = $request->image;
        $product->category      = $request->category;
        $product->available     = $request->available;
        $product->is_deprecated = isset($request->is_deprecated);

        if ($request->file('file')){
            $product->image = $request->file('file')->store('product','public');
        }
        $product->update();
        return back();
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function destroy(Product $product)
    {
        // dd($product);
        $product->delete();
        return back();
    }

        /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function catalogue()
    {
        $products = Product::all();
        //return $products;
        return view('product.catalogue' , ['products' => $products] );
    }


}
