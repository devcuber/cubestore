@extends('home')
@section('content')

            <div class='row'>
            <form action=" {{route('product.update',$product)}}" method="POST">
            @method('PUT')
            @csrf
            <div class="form-group">
                <label for="code">Codigo</label>
                <input type="text" class="form-control" name="code" id="code" placeholder="Codigo de barra" value="{{$product->code}}">
            </div>
            <div class="form-group">
                <label for="name">Nombre</label>
                <input type="text" class="form-control" name="name" id="name" placeholder="Nombre" value="{{$product->name}}">
            </div>
            <div class="form-group">
                <label for="option">Opcion</label>
                <input type="text" class="form-control" name="option" id="option" placeholder="Opcion" value="{{$product->option}}">
            </div>
            <div class="form-group">
                <label for="seller">Vendedor</label>
                <input type="text" class="form-control" name="seller" id="seller" placeholder="Vendedor" value="{{$product->seller}}">
            </div>
            <div class="form-group">
                <label for="cost">Costo</label>
                <input type="text" class="form-control" name="cost" id="cost" placeholder="Costo" value="{{$product->cost}}">
            </div>
            <div class="form-group">
                <label for="price">Precio</label>
                <input type="text" class="form-control" name="price" id="price" placeholder="Precio" value="{{$product->price}}">
            </div>
            <div class="form-group">
                <label for="category">Categoría</label>
                <input type="text" class="form-control" name="category" id="category" placeholder="Categoría" value="{{$product->category}}">
            </div>
            <div class="form-group">
                <label for="available">Disponible</label>
                <input type="text" class="form-control" name="available" id="available" aria-describedby="emailHelp" placeholder="Disponible" value="{{$product->available}}">
            </div>
            <br>
            <a href="{{route('product.index')}}" class="btn btn-primary" > Cancelar </a>
            <button type="submit" class="btn btn-primary">Guardar</button>
            </form>
            </div>
@endsection