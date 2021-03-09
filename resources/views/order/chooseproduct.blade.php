@extends('home')
@section('content')

        <div class="row">
            @foreach($products as $product)
            <div class="card" style="width: 18rem;">
            <div class="card-body">
                <h5 class="card-title">{{$product->name}}</h5>
                <img class="card-img-top" src="{{$product->image}}" alt="{{$product->name}}">
                <h6 class="card-subtitle mb-2 text-muted">{{$product->category}}</h6>
                <h6 class="card-subtitle mb-2 text-muted"> Precio: Lps {{$product->price}}</h6>
                <h6 class="card-subtitle mb-2 text-muted"> Disponible: {{$product->available}}</h6>
                <form action="{{route('order.setproduct',$order) }}" method="POST">
                    @method('PUT')
                    @csrf
                    <input type="hidden" name="product_id" value="{{$product->id}}">
                    <input type="submit" class="btn btn-primary" value="Seleccionar">
                </form>
            </div>
            </div>
            @endforeach
        </div>

@endsection('content')
