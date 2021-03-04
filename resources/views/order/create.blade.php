@extends('home')
@section('content')
    <br>
    <div class='row'>
    <form action=" {{route('order.store')}}" method="POST">
    @method('POST')
    @csrf
    <div class="form-group">
        <label for="client_id">Cliente</label>
        <br>
        {{-- TODO cargar clientes desde base de datos --}}
        <select name="client_id" id="client_id">
            <option value = "1">Jose</option>
            <option value = "2">Claudia</option>
            <option value = "3">Nelson</option>
        </select>
    </div>
    <div class="form-group">
        {{-- TODO cargar clientes desde base de datos --}}
        <label for="shipping_info_id">Información de Envío</label>
        <br>
        <select name="shipping_info_id" id="shipping_info_id">
            <option value = "1">SPS</option>
            <option value = "2">Tgu</option>
            <option value = "3">Ceiba</option>
        </select>
    </div>
    <div class="form-group">
        <label for="comment">Comentario</label>
        <br>
        <textarea name="comment" id="comment" cols="30" rows="3"></textarea>
    </div>
    <br>
    <a href="{{route('order.index')}}" class="btn btn-primary" > Regresar </a>
    <button type="submit" class="btn btn-primary">Guardar</button>
    </form>
    </div>
@endsection
