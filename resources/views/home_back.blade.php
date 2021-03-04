@extends('layouts.app')

@section('content')
    {{use App\Models\Product;}}
    @include('product.catalogue', ['products' => Product::orderBy('id','DESC')->get()])
@endsection
