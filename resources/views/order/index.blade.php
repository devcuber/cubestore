@extends('home')
@section('content')

<br>
    <div class='col-sm-8 mx-auto'>
        <form action="{{route('order.store')}}" method="POST"> 
        @csrf
        @method('POST')
        <input type="hidden"  name='client_id'          value ="1">
        <input type="hidden"  name='shipping_info_id'   value ="1">
        <input type="submit"  class="btn btn-primary btn-lg " value ="Nueva Orden">
        </form>
    </div>
<br>

<div class='row'>
    <div class='col-sm-8 mx-auto'>
        <table class="table">
            <thead>
                <th></th>
                <th>Estado</th>
                <th>orden</th>
                <th>cliente</th>
                <th>&nbsp</th>
                <th>&nbsp</th>
            </thead>
            <tbody>
                @foreach($orders as $order)
                <tr>
                    <td>{!! $order->GetStatus->html_icon !!}</td>
                    <td>{{$order->GetStatus->code}}</td>
                    <td>{{$order->GetOrderCode}}</td>
                    <td>{{$order->client->name}}</td>
                    <td></td>
                    <td> <a href="{{route('order.edit',$order)}}" class="btn btn-primary btn-sm" >Ver</a></td>
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</div>

@endsection