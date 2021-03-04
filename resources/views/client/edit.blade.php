
@extends('home')
@section('content')
<br>
<div class='row'>
    <h1> {{$client->name . ' ' . $client->phone }} </h1>
</div>
<br>

<h1 class="col-sm-8 mx-auto">Informacion de entrega</h1>
<div class="row">
<div class="col-sm-10 mx-auto">
  <form action="{{route('shipping_information.store')}}" class="form-inline" method="POST">
      @method('POST')
      @csrf
      <label for="name_holder"> Nuevo informacion de entrega</label>
      <input name ="client_id"      type="hidden"   placeholder="Nombre" value="{{$client->id}}">
      <input name ="name_holder"    type="text"     placeholder="Nombre" value="" >
      <input name ="phone"          type="text"     placeholder="teléfono" value="">
      <input name ="city"           type="text"     placeholder="ciudad" value="">
      <input name ="address"        type="text"     placeholder="dirección" value="">

      <input type="submit" class="btn btn-primary btn-sm " value="Agregar Información">
  </form>
</div>
</div>

        <table class="table">
        <thead>
            <th>&nbsp</th>
            <th>Nombre</th>
            <th>Telefono</th>
            <th>ciudad</th>
            <th>direccion</th>
            <th>principal</th>
            <th>&nbsp</th>
            <th>&nbsp</th>
        </thead>
        <tbody>
        @foreach($client->Shipping_Informations as $Shipping_Information)
        <tr>
                <td></td>
            <form action="{{route('shipping_information.update',$Shipping_Information)}}" method="POST">
                @method('PUT')
                @csrf
                <td> <input name="name_holder" type="text" class="form-control" value="{{$Shipping_Information->name_holder}}"></td>
                <td> <input name="phone"type="text" class="form-control" value="{{$Shipping_Information->phone}}"></td>
                <td> <input name="city"type="text" class="form-control" value="{{$Shipping_Information->city}}"></td>
                <td> <textarea name="address" id="" cols="50" rows="3" class="form-control">{{$Shipping_Information->address}}</textarea></td>
                <td> <input name="is_default"type="checkbox" class="form-check-input" {{ ($Shipping_Information->is_default)?'checked':'' }} ></td>
                <td> <input type="submit" class="btn btn-sm btn-primary" value="guardar"></td>
            </form>
                <td>
                <form action="{{route('shipping_information.destroy' , $Shipping_Information )}}" method="POST">
                @method('DELETE')
                @csrf
                    <input type="submit"
                        class="btn btn-sm btn-danger"
                        value="Eliminar"
                        onclick = "return confirm('¿deseas eliminar?');"
                    >
                </form></td>
        </tr>
        @endforeach
        </tbody>
        </table>
        </form>
    </div>
@endsection