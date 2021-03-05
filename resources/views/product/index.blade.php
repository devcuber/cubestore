@extends('home')
@section('content')

<h1  class="col-sm-6 mx-auto">Productos</h1>
<div class="row">
<div class="col-sm-6 mx-auto">
    <form action="{{route('product.store')}}" class="form-inline" method="POST">
    @method('POST')
    @csrf
    <input name ="code"             type="text"   placeholder="Código"     value="">
    <input name ="name"             type="text"   placeholder="Nombre"     value="">
    <input name ="option"           type="text"   placeholder="Opción"     value="">
    <input name ="category"         type="text"   placeholder="Categoría"  value="">
    <input name ="cost"             type="text"   placeholder="Costo"      value="">
    <input name ="price"            type="text"   placeholder="Precio"     value="">
    <input name ="available"        type="text"   placeholder="Disponible" value="">
    <input name ="seller"           type="hidden"            value= "Inframundohn">
    <input type="submit" class="btn btn-primary btn-sm " value="Agregar Producto">
    </form>
</div>
</div>

<div class='row'>
    <div class='col-sm-12 mx-auto'>
        <table class="table">
            <thead>
                <th>Imagen</th>
                <th>Codigo</th>
                <th>Nombre</th>
                <th>Opcion</th>
                <th>Categoría</th>
                <th>Costo</th>
                <th>Precio</th>
                <th>Disponible</th>
                <th>Imágen</th>
                <th>Obsoleto</th>
                <th>&nbsp</th>
                <th>&nbsp</th>
            </thead>
            <tbody>
                @foreach($products as $product)
                <tr>
                    <form   action  ="{{route('product.update',$product)}}"
                            method  ="POST"
                    >
                        @method('PUT')
                        @csrf
                        <td> <img style="height: 50px; width: 50px" src="{{$product->image}}" alt="{{$product->name}}" ></td>
                        <td> <input type="text"     name="code"          class="form-control"   value="{{$product->code}}" ></td>
                        <td> <input type="text"     name="name"          class="form-control"   value="{{$product->name}}" ></td>
                        <td> <input type="text"     name="option"        class="form-control"   value="{{$product->option}}" ></td>
                        <td> <input type="text"     name="category"      class="form-control"   value="{{$product->category}}" ></td>
                        <td> <input type="number"   name="cost"          class="form-control"   value="{{$product->cost}}" ></td>
                        <td> <input type="number"   name="price"         class="form-control"   value="{{$product->price}}" ></td>
                        <td> <input type="number"   name="available"     class="form-control"   value="{{$product->available}}" ></td>
                        <td> <input type="text"     name="image"         class="form-control"   value="{{$product->image}}"></td>
                        <td> <input type="checkbox" name="is_deprecated" class="form-check-input" {{ ($product->is_deprecated)?'checked':'' }} ></td>
                        <td><input type="submit" class="btn btn-sm btn-primary" value="Guardar"></td>
                    </form>
                    <td>
                        <form action="{{route('product.destroy',$product)}}" method="POST">
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
