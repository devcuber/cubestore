
@extends('home')
@section('content')

<div class="container">

    <button type="button"
    class="btn btn-primary btn-lg rounded-circle fixed-bottom"
    data-toggle="modal"
    data-target="#new_client_modal"
    style="left: 85%; bottom:3%;"
    >
    +
    </button>

    <div class="row">
        <div class="col">
            <h1 class="text-center">Clientes</h1>
        </div>
    </div>

    <div class='table-responsive'>
        <table class="table">
            <thead>
                @isset($order)
                <th>Elegir</th>
                @endisset
                <th>#</th>
                <th>Nombre</th>
                <th>Telefono</th>
                <th>&nbsp</th>
                <th>&nbsp</th>
                <th>&nbsp</th>
            </thead>
            <tbody>
                @foreach($clients as $client)
                <tr>
                @isset($order)
                <td>
                    <form action="{{route('order.setclient',$order) }}" method="POST">
                        @method('PUT')
                        @csrf
                        <input type="hidden" name="client_id" value="{{$client->id}}">
                        <input type="submit" class="btn btn-primary btn-sm" value = 'Seleccionar'>
                    </form>
                </td>
                @endisset
                <form action="{{route('client.update',$client)}}" class="form-inline" method='POST'>
                @method('PUT')
                @csrf
                    <td scope="row"> {{$loop->iteration}} </td>
                    <td> <input type="text"   name="name"  class="form-control-plaintext" value="{{$client->name}}"></td>
                    <td> <input type="text"   name="phone" class="form-control-plaintext" value="{{$client->phone}}"></td>
                    <td><a href="{{route('client.edit',$client)}}" class="btn btn-outline-primary btn-sm">Info. Envios</a></td>
                    <td> <input type="submit" class="btn btn-outline-primary btn-sm" value = '💾'></td>
                </form>
                <td>
                <form action="{{route('client.destroy',$client)}}" method="POST">
                    @method('DELETE')
                    @csrf
                    <input  type   ="submit" 
                            class  ="btn btn-outline-danger btn-sm" 
                            value  = '🗑️' 
                            onclick = "return confirm('¿deseas eliminar?');"
                    >
                </form>
                </td>
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</div>

@endsection

    <!-- Modal -->
<div class="modal fade" id="new_client_modal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
<div class="modal-dialog">
<div class="modal-content">
    <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Nuevo Producto</h5>
        <button type="button" class="btn-close" data-dismiss="modal" aria-label="Close"></button>
    </div>

    <form action="{{route('client.store')}}" method="POST">
        <div class="modal-body">
            <div class="form-group">
                @method('POST')
                @csrf
                <label for="name">  Nombre </label>
                <input id="name"    name ="name"  type="text" placeholder="Nombre"   class="form-control" value="" >
                <label for="phone"> Teléfono </label>
                <input id ="phone"  name ="phone" type="text" placeholder="teléfono" class="form-control" value="">
            </div>
        </div>
        <div class="modal-footer">
            <button type="button" class="btn btn-secondary" data-dismiss="modal">Cerrar</button>
            <input type="submit" class="btn btn-primary" value="Guardar">
        </div>
    </form>
</div>
</div>
</div>