@extends('home')
@section('content')
<div class='row'>
<form action=" {{route('product.store')}}" method="POST">
@method('POST')
@csrf
    <div class="form-group">
        <label for="code">Codigo</label>
        <input type="text" class="form-control" name="code" id="code" placeholder="Codigo de barra" value="">
    </div>
    <div class="form-group">
        <label for="name">Nombre</label>
        <input type="text" class="form-control" name="name" id="name" placeholder="Nombre" value="">
    </div>
    <div class="form-group">
        <label for="option">Opcion</label>
        <input type="text" class="form-control" name="option" id="option" placeholder="Opcion" value="">
    </div>
    <div class="form-group">
        <label for="seller">Vendedor</label>
        <input type="text" class="form-control" name="seller" id="seller" placeholder="Vendedor" value="">
    </div>
    <div class="form-group">
        <label for="cost">Costo</label>
        <input type="text" class="form-control" name="cost" id="cost" placeholder="Costo" value="">
    </div>
    <div class="form-group">
        <label for="price">Precio</label>
        <input type="text" class="form-control" name="price" id="price" placeholder="Precio" value="">
    </div>
    <div class="form-group">
        <label for="category">Categoría</label>
        <input type="text" class="form-control" name="category" id="category" placeholder="Categoría" value="">
    </div>
    <div class="form-group">
        <label for="available">Disponible</label>
        <input type="text" class="form-control" name="available" id="available" aria-describedby="emailHelp" placeholder="Disponible" value="">
    </div>
    <br>
    <a href="{{route('product.index')}}" class="btn btn-primary" > Cancelar </a>
    <button type="submit" class="btn btn-primary">Guardar</button>
</form>
</div>
@endsection
