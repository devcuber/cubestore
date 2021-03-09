@extends('home')
@section('content')

<div class="container">

    <div class="row">
        <div class="col">

            <div class="row">
                <div class="col col-12">

                    <table>
                        <tr>
                            <td>Order:</td>
                            <td><strong>{{$order->GetOrderCode}}</strong></td>
                            <td>&nbsp</td>
                        </tr>
                        <tr>
                            <td>Cliente:</td>
                            <td><strong> {{$order->client->name}} </strong></td>
                            <td><a href="{{route('chooseclient',$order)}}" class="btn btn-sm btn-outline-primary">✏️</a></td>
                        </tr>
                        <tr>
                            <td>Telefono:</td>
                            <td><strong> {{$order->client->phone}}</td>
                            <td>&nbsp</td>
                        </tr>
                        <tr>
                            <td>Dirección:</td>
                            <td>&nbsp</td>
                            <td><a  href="{{route('chooseshippinginfo',$order)}}" class="btn btn-sm btn-outline-primary">✏️</a></td>
                        </tr>
                    </table>
                </div>
            </div>

            <div class="row pt-2" >
                <div class="col">
<textarea name="address" id="address" cols="40" rows="5" readonly>
Recibe: {{$order->shipping_information->name_holder}} | {{$order->shipping_information->phone}}
Ciudad: {{$order->shipping_information->city}}
{{$order->shipping_information->address}}
</textarea>
                </div>
            </div>
        </div>
        <div class="col">

            <div class="table-responsive">
                <table class="table">
                    <thead>
                        <th scope="col">Imagen</th>
                        <th scope="col">Producto</th>
                        <th scope="col">Cantidad</th>
                        <th scope="col">Precio&nbspVenta</th>
                        <th scope="col">Total</th>
                        <th scope="col">&nbsp</th>
                        <th scope="col"> <a href="{{route('chooseproduct',$order)}}" class="btn btn-sm btn-primary rounded-circle">+</a></th>
                    </thead>
                    <tbody>
                    @foreach($order->order_lines as $order_line)
                    <tr>
                            <td> <img width="100%" src="{{$order_line->product->image}}" alt="{{$order_line->product->name}}"> </td>
                        <form action="{{route('order_line.update',$order_line)}}" method="POST">
                            @method('PUT')
                            @csrf
                            <td> {{$order_line->product->GetName}}</td>
                            <td> <input name="quantity"     type="number"   class="form-control" value="{{$order_line->quantity}}"></td>
                            <td> <input name="unit_price"   type="text"     class="form-control" value="{{$order_line->unit_price}}"></td>
                            <td> {{$order_line->GetTotal}} </td>
                            <td> <input type="submit" class="btn btn-sm btn-outline-primary" value="💾"></td>
                        </form>
                            <td>
                                <form action="{{route('order_line.destroy' , $order_line->id )}}" method="POST">
                                @method('DELETE')
                                @csrf
                                    <input type="submit"
                                        class="btn btn-sm btn-outline-danger"
                                        value="🗑️"
                                        onclick = "return confirm('¿deseas eliminar?');"
                                    >
                                </form>
                            </td>
                    </tr>
                    @endforeach
                    <tr>
                        <td> <strong>TOTAL</strong></th>
                        <td>&nbsp</th>
                        <td>&nbsp</th>
                        <td>{{$order->GetTotal}}</th>
                        <td>&nbsp</th>
                        <td>&nbsp</th>
                    </tr>
                    </tbody>
                </table>
            </div>
        </div>
    </div>

    <div class="row">
        <div class="col">
            <form action="{{route('order.changestatus',$order)}}" method="POST">
                @method('PUT')
                @csrf
                <input type="hidden" name="NextStatusCode" value="CAN">
                <input type="submit" class="btn btn-sm btn-outline-danger"  value="Cancelar Orden">
            </form>
        </div>
        <div class="col">
            <form action="{{route('order.changestatus',$order)}}" method="POST">
                @method('PUT')
                @csrf
                <input type="hidden" name="NextStatusCode" value="CON">
                <input type="submit" class="btn btn-sm btn-outline-danger"  value="Contratiempo">
            </form>
        </div>
        <div class="col">
            <form action="{{route('order.changestatus',$order)}}" method="POST">
                @method('PUT')
                @csrf
                <input type="hidden" name="NextStatusCode" value="{{$order->GetNextStatus->code}}">
                <input type="submit" class="btn btn-sm btn-primary" value="{{$order->GetNextStatus->description}}">
            </form>
        </div>
    </div>




    </div>
    </div>

</div>



@endsection


