@extends('home')
@section('content')

<div class="container">
    <form action="{{route('order.store')}}" method="POST"> 
    @csrf
    @method('POST')
    <input type="hidden"  name='client_id'          value ="1">
    <input type="hidden"  name='shipping_info_id'   value ="1">
    <input  type="submit"  
            class="btn btn-primary btn-lg rounded-circle fixed-bottom"
            value ="+"
            style="left: 85%; bottom:3%;">
    </form>

    <div class="row justify-content-around pb-4">
        <div class="col">
            <h2 class="text-center">Ordenes</h2>
        </div>
    </div>


    <div class='table-responsive'>
        <table class="table">
            <thead>
                <th scope="col">&nbsp</th>
                <th scope="col">Estado</th>
                <th scope="col">Orden</th>
                <th scope="col">Cliente</th>
                <th scope="col">&nbsp</th>
            </thead>
            <tbody>
                @foreach($orders as $order)
                <tr>
                    <td>{!! $order->GetStatus->html_icon !!}</td>
                    <td>{{$order->GetStatus->code}}</td>
                    <td>{{$order->GetOrderCode}}</td>
                    <td>{{$order->client->name}}</td>
                    <td> <a href="{{route('order.edit',$order)}}" class="btn btn-outline-primary btn-sm" >✏️</a></td>
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>

</div>



@endsection