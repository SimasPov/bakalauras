@extends('layout/main')

@section('content')
    <div class="row">
        <div class="col-sm-6 col-md-4 col-md-offset-4 col-sm-offset-3">
            <h1>Mokėjimas</h1>
            <hr>
            <h4>Iš viso: {{ $total }}&euro;</h4>
            <div class="alert alert-danger" id="charge-error" {{ !Session::has('error') ? 'hidden' : '' }}>
                {{ Session::get('error') }}
            </div>
            <form action="{{ route('checkout') }}" method="post" id="checkout-form">
                @csrf
                <div class="row">
                    <div class="col-xs-12">
                        <div class="form-group">
                            <label for="name">Vardas</label>
                            <input type="text" id="name" class="form-control" required>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-xs-12">
                        <div class="form-group">
                            <label for="address">Adresas</label>
                            <input type="text" id="address" class="form-control" required>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-xs-12">
                        <div class="form-group">
                            <label for="card-name">Kortelės Sąvininkas</label>
                            <input type="text" id="card-name" class="form-control" required>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-xs-12">
                        <div class="form-group">
                            <label for="card-number">Kortelės numeris</label>
                            <input type="text" id="card-number" class="form-control" required>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-xs-12">
                        <div class="form-group">
                            <label for="card-expiry-month">Kortelės galiojimo pabaigos mėnuo</label>
                            <input type="text" id="card-expiry-month" class="form-control" required>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-xs-12">
                        <div class="form-group">
                            <label for="card-expiry-year">Kortelės galiojimo pabaigos metai</label>
                            <input type="text" id="card-expiry-year" class="form-control" required>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-xs-12">
                        <div class="form-group">
                            <label for="card-cvc">CVC numeris</label>
                            <input type="text" id="card-cvc" class="form-control" required>
                        </div>
                    </div>
                </div>
                <button type="submit" class="btn btn-success">Pirkti</button>
            </form>
        </div>
    </div>
@endsection

@section('scripts')
    <script type="text/javascript" src="https://js.stripe.com/v3/"></script>
@endsection