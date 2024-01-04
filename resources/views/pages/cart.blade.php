@extends('layout/main')

@section('content')
    <h1>Pirkinių krepšelis</h1>
    <hr>
    @if(Session::has('cart'))
        <div class="row">
            <div class="col-sm-6 col-md-6 col-md-offset-3 col-sm-offset-3">
                <ul class="list-group">
                    @foreach($comics as $comic)
                        <li class="list-group-item">
                            <span class="badge">{{ $comic['qty'] }}</span>
                            <strong>{{ $comic['item']['title'] }}</strong>
                            <span class="label-success">{{ $comic['price'] }} &euro;</span>
                            <div class="btn-group">
                                <button type="button" class="btn btn-primary btn-xs dropdown-toggle" data-toggle="dropdown">
                                    Pašalinti <span class="caret"></span>
                                </button>
                                <ul class="dropdown-menu">
                                    <li><a href="/reduce/{{ $comic['item']['id'] }}">Pašalinti 1</a></li>
                                    <li><a href="/remove/{{ $comic['item']['id'] }}">Pašalinti visus</a></li>
                                </ul>
                            </div>
                        </li>
                    @endforeach
                </ul>
            </div>
        </div>
    <div class="row">
        <div class="col-sm-6 col-md-6 col-md-offset-3 col-sm-offset-3">
            <strong>Krepšelio suma: {{ $totalPrice }} &euro;</strong>
        </div>
    </div>
    <hr>
    <form method="POST" action="/shopping-cart/store-order" enctype="multipart/form-data" class="form-horizontal" >
        {{csrf_field()}}
        <div class="row">
            <div class="col-xs-12">
                <div class="form-group">
                    <label for="ship_name">Vardas</label>
                    <input type="text" id="ship_name" name="ship_name" class="form-control" required>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-xs-12">
                <div class="form-group">
                    <label for="ship_surname">Pavardė</label>
                    <input type="text" id="ship_surname" name="ship_surname" class="form-control" required>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-xs-12">
                <div class="form-group">
                    <label for="ship_address">Adresas</label>
                    <input type="text" id="ship_address" name="ship_address" class="form-control" required>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-xs-12">
                <div class="form-group">
                    <label for="post_code">Pašto kodas</label>
                    <input type="number" id="post_code" name="post_code" class="form-control" required>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-xs-12">
                <div class="form-group">
                    <label for="email">El. paštas</label>
                    <input type="email" id="email" name="email" class="form-control" required>
                </div>
            </div>
        </div>
        <button type="submit" class="btn btn-success">Pirkti</button>
    </form>

    @else
        <div class="row">
            <div class="col-sm-6 col-md-6 col-md-offset-3 col-sm-offset-3">
                <h2>Krepšelis tuščias</h2>
            </div>
        </div>
    @endif
@endsection