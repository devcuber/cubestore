
@extends('home')
@section('content')
    <div class='row'>
    <form action=" {{route('client.store')}}" method="POST">
    @method('POST')
    @csrf
    <div class="form-group">
        <label for="code">Nombre</label>
        <input type="text" class="form-control" name="name" id="name" placeholder="Nombre" value="">
    </div>
    <div class="form-group">
        <label for="phone">Teléfono</label>
        <input type="text" class="form-control" name="phone" id="name" placeholder="Teléfono" value="">
    </div>
    <br>
    <a href="{{route('client.index')}}" class="btn btn-primary" > Cancelar </a>
    <button type="submit" class="btn btn-primary">Guardar</button>
    </form>
    </div>
@endsection
