
@extends('home')
@section('content')
<br>
    <a href="{{route('client.create')}}" class="btn btn-primary btn-lg "> Nuevo Cliente </a>
<br>

<div class='row'>
    <div class='col-sm-8 mx-auto'>
        <table class="table">
            <thead>
                <th>Nombre</th>
                <th>Telefono</th>
                <th>&nbsp</th>
                <th>&nbsp</th>
            </thead>
            <tbody>
                @foreach($clients as $client)
                <tr>
                    <td>{{$client->name}}</td>
                    <td>{{$client->phone}}</td>
                    <td> <a href="{{route('client.edit',$client)}}" class="btn btn-primary btn-sm" >Editar</a></td>
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