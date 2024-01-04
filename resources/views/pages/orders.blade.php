@extends('layout/main')

@section('content')
    <h1>Užsakymai</h1>
    <hr>
    <div class="container">
        <div class="row">
            <table class="table table-bordered">
                <tr>
                    <th>Užsakymo id</th>
                    <th>Vardas</th>
                    <th>Pavardė</th>
                    <th>Adresas</th>
                    <th>El. Paštas</th>
                    <th>Pašto kodas</th>
                    <th>Kaina</th>
                    <th>Būsena</th>
                </tr>
                @foreach($orders as $order)
                    <tr>
                        <td>{{$order->id}}</td>
                        <td>{{$order->ship_name}}</td>
                        <td>{{$order->ship_surname}}</td>
                        <td>{{$order->ship_address}}</td>
                        <td>{{$order->email}}</td>
                        <td>{{$order->post_code}}</td>
                        <td>{{$order->total_price}}</td>
                        <td>{{$order->order_status}}</td>
                    </tr>
                @endforeach
            </table>
        </div>
    </div>
@endsection