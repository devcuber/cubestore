
@extends('home')
@section('content')
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
            <th>&nbsp</th>
            <th>Nombre</th>
            <th>Telefono</th>
            <th>&nbsp</th>
            <th>&nbsp</th>
            <th>&nbsp</th>
        </thead>
        <tbody>
            @foreach($clients as $client)
            <tr>
            <td>
            @yield('seleccionar')
            </td>
            <form action="{{route('client.update',$client)}}" method='POST'>
            @method('PUT')
            @csrf
                <td> <input type="text"   name="name"  value="{{$client->name}}"></td>
                <td> <input type="text"   name="phone" value="{{$client->phone}}"></td>
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
@endsection

    <!-- Modal -->
<div class="modal fade" id="new_client_modal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
<div class="modal-dialog">
<div class="modal-content">
    <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Nuevo Producto</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
    </div>

    <form action="{{route('client.store')}}" class="form-inline" method="POST">
        <div class="modal-body">
            @method('POST')
            @csrf
            <input name ="name"  type="text" placeholder="Nombre" value="" >
            <input name ="phone" type="text" placeholder="teléfono" value="">
        </div>
        <div class="modal-footer">
            <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
            <input type="submit" class="btn btn-primary btn-sm " value="Agregar Cliente">
        </div>
    </form>
</div>
</div>
</div>