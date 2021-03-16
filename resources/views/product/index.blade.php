@extends('home')
@section('content')

<div class="container">
    <button type="button"
  class="btn btn-primary btn-lg rounded-circle fixed-bottom"
            data-toggle="modal"
            data-target="#new_product_modal"
            style="left: 85%; bottom:3%;"
    >
    +
    </button>
    <div class="row">
        <div class="col">
            <h1 class="text-center">Productos</h1>
        </div>
    </div>

    <div class='table-responsive'>
        <table class="table">
            <thead>
                <th scope="col">#</th>
                <th scope="col">Imagen</th>
                <th scope="col">Codigo&nbspde&nbspBarra</th>
                <th scope="col">Nombre&nbspdel&nbspProducto</th>
                <th scope="col">Opcion&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp</th>
                <th scope="col">Categoría</th>
                <th scope="col">Precio&nbspCosto</th>
                <th scope="col">Precio&nbspVenta</th>
                <th scope="col">Disponible</th>
                <th scope="col">Imagen&nbspURL</th>
                <th scope="col">Obsoleto</th>
                <th scope="col">&nbsp</th>
                <th scope="col">&nbsp</th>
            </thead>
            <tbody>
                @foreach($products as $product)
                <tr>
                    <form action="{{route('product.update',$product)}}" class="form-inline" method="POST">
                        @method('PUT')
                        @csrf
                        <td scope="row"> {{$loop->iteration}} </td>
                        <td> <img style="height: 50px; width: 50px" src="{{$product->image}}" alt="{{$product->name}}" ></td>
                        <td> <input type="text"     name="code"class="form-control-plaintext"   value="{{$product->code}}" ></td>
                        <td> <input type="text"     name="name"class="form-control-plaintext"   value="{{$product->name}}" ></td>
                        <td> <input type="text"     name="option"        class="form-control-plaintext"   value="{{$product->option}}" ></td>
                        <td> <input type="text"     name="category"      class="form-control-plaintext"   value="{{$product->category}}"  min="1" ></td>
                        <td> <input type="number"   name="cost"class="form-control-plaintext"   value="{{$product->cost}}"      min="1" ></td>
                        <td> <input type="number"   name="price"         class="form-control-plaintext"   value="{{$product->price}}"     min="1" ></td>
                        <td> <input type="number"   name="available"     class="form-control-plaintext"   value="{{$product->available}}" min="1" ></td>
                        <td> <input type="text"     name="image"         class="form-control-plaintext"   value="{{$product->image}}"></td>
                        <td> <input type="checkbox" name="is_deprecated" class="form-control-plaintext" {{ ($product->is_deprecated)?'checked':'' }} ></td>
                        <td><input type="submit" class="btn btn-sm btn-outline-primary" value="💾"></td>
                    </form>
                    <td>
                        <form action="{{route('product.destroy',$product)}}" method="POST">
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
    <div class="modal fade" id="new_product_modal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog">
          <div class="modal-content">
            <div class="modal-header">
              <h5 class="modal-title" id="exampleModalLabel">Nuevo Producto</h5>
              <button type="button" class="btn-close" data-dismiss="modal" aria-label="Close"></button>
            </div>
            <form action="{{route('product.store')}}" method="POST">
                <div class="modal-body">
                    <div class="form-group">
                        @method('POST')
                        @csrf
                        <label for  ="name">    Nombre </label>
                        <input name ="name"     class="form-control" type="text"   placeholder="Nombre"     value="">
                        <label for  ="name">    Opcion </label>
                        <input name ="option"   class="form-control" type="text"   placeholder="Opción"     value="">
                        <label for  ="code">    Codigo de barra </label>
                        <input name ="code"     class="form-control" type="text"   placeholder="Código"     value="">
                        <label for  ="name">    Categoria </label>
                        <input name ="category" class="form-control" type="text"   placeholder="Categoría"  value="">
                        <label for  ="name">    Costo </label>
                        <input name ="cost"     class="form-control" type="number"   placeholder="Costo"      value="0">
                        <label for  ="name">    Precio de venta </label>
                        <input name ="price"    class="form-control" type="number"   placeholder="Precio"     value="0">
                        <label for  ="name">    Cantidad Disponible  </label>
                        <input name ="available"class="form-control" type="number"   placeholder="Disponible" value="0">
                        <label for  ="name">    URL de imágen </label>
                        <input name ="image"    class="form-control" type="text"   placeholder="URL imágen" value="">
                        <input name ="seller"   class="form-control" type="hidden"            value= "Inframundohn">
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