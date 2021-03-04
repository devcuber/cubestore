
@extends('home')
@section('content')

<br>

<h1 class="col-sm-8 mx-auto">Clientes</h1>
<div class="row">
<div class="col-sm-8 mx-auto">
  <form action="{{route('client.store')}}" class="form-inline" method="POST">
      @method('POST')
      @csrf
      <label for="name"> Nuevo Cliente</label>
      <input name ="name"  type="text" placeholder="Nombre" value="" >
      <input name ="phone" type="text" placeholder="teléfono" value="">

      <input type="submit" class="btn btn-primary btn-sm " value="Agregar Cliente">
  </form>
</div>
</div>


<div class='row'>
    <div class='col-sm-8 mx-auto'>
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
                    <td> <input type="submit" class="btn btn-primary btn-sm" value = 'Guardar'></td>
                </form>
                <td><a href="{{route('client.edit',$client)}}" class="btn btn-primary btn-sm">Info. Envios</a></td>
                <td>
                <form action="{{route('client.destroy',$client)}}" method="POST">
                    @method('DELETE')
                    @csrf
                    <input  type   ="submit" 
                            class  ="btn btn-danger btn-sm" 
                            value  = 'Eliminar' 
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