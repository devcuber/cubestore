@extends('home')
@section('content')


        <div class="row">
            <div class="form-group">
                <label for="order_num">orden</label>
                <input readonly type="text" name="order_num" id="name" placeholder="Nombre" value="{{$order->GetOrderCode}}">
            </div>
        </div>

        <div class="row">
            <div class="form-group">
                <label for="client_id">Cliente</label>
                <input  id  ="client_id"   
                        name="client_id"   
                        type="hidden" 
                        value="{{$order->client->id}}"
                >
                <input  id="client_name" 
                        name="client_name" 
                        type="text"   
                        value="{{$order->client->name}}" 
                        readonly
                >
                <label for="phone">Telefono</label>
                <input  id="phone" 
                        name="phone" 
                        type="text"   
                        value="{{$order->client->phone}}" 
                        readonly
                >
                <a href="{{route('chooseclient',$order)}}" class="btn btn-sm btn-primary"> Elegir Cliente</a>
            </div>
        </div>

        <div class="row">
            <div class="form-group">
                <label for="name_holder">Nombre Recibe</label>
                <input  id="name_holder"
                        name="name_holder"
                        type="text"
                        readonly
                        value="{{$order->shipping_information->name_holder}}"
                >
                <label for="phone">Telefono</label>
                <input  id="phone"
                        name="phone"
                        type="text"
                        readonly
                        value="{{$order->shipping_information->phone}}"
                >
                <label for="city">Ciudad</label>
                <input  id="city"
                        name="city"
                        type="text"
                        readonly
                        value="{{$order->shipping_information->city}}"
                >
                <label for="address">Direccion</label>
                <textarea name="address" id="address" cols="30" rows="2" readonly>
                {{$order->shipping_information->address}}
                </textarea>

                <a href="{{route('chooseshippinginfo',$order)}}" class="btn btn-sm btn-primary"> Elegir Direccion</a>
            </div>
        </div>
        <br>

    <a href="{{route('chooseproduct',$order)}}" class="btn btn-sm btn-primary">Agregar producto</a>

    <table class="table">
    <thead>
        <th>producto</th>
        <th>cantidad</th>
        <th>precio unitario</th>
        <th>Sub total</th>
        <th>&nbsp</th>
        <th>&nbsp</th>
    </thead>
    <tbody>
    @foreach($order->order_lines as $order_line)
    <tr>
        <form action="{{route('order_line.update',$order_line)}}" method="POST">
            @method('PUT')
            @csrf
            <td> <input name="product_name" type="text"     class="form-control" value="{{$order_line->product->GetName}}"></td>
            <td> <input name="quantity"     type="number"   class="form-control" value="{{$order_line->quantity}}"></td>
            <td> <input name="unit_price"   type="text"     class="form-control" value="{{$order_line->unit_price}}"></td>
            <td> <input name="total"        type="text"     class="form-control" value="{{$order_line->GetTotal}}" readonly></td>
            <td> <input type="submit" class="btn btn-sm btn-primary" value="guardar"></td>
        </form>
            <td>
            <form action="{{route('order_line.destroy' , $order_line )}}" method="POST">
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

    <div class="row">
    <div class="form-group">
        <label for="OrderTotal">Total a pagar Lps.</label>
        <input  readonly type="text" name="OrderTotal" id="OrderTotal" value="{{$order->GetTotal}}">
    </div>
    </div>

    <br>
    <div class="row">
    <div class="form-group">
        <form action="{{route('order.changestatus',$order)}}" method="POST">
            @method('PUT')
            @csrf
            <input type="hidden" name="NextStatusCode" value="CAN">
            <input type="submit" class="btn btn-lg btn-danger"  value="Cancelar Orden">
        </form>
        <form action="{{route('order.changestatus',$order)}}" method="POST">
            @method('PUT')
            @csrf
            <input type="hidden" name="NextStatusCode" value="CON">
            <input type="submit" class="btn btn-lg btn-danger"  value="Contratiempo">
        </form>


        <form action="{{route('order.changestatus',$order)}}" method="POST">
            @method('PUT')
            @csrf
            <input type="hidden" name="NextStatusCode" value="{{$order->GetNextStatus->code}}">
            <input type="submit" class="btn btn-lg btn-primary" value="{{$order->GetNextStatus->description}}">
        </form>


    </div>
    </div>


@endsection


