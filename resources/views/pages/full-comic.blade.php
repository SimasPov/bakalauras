@extends('layout/main')

@section('content')
        <div class="row">
            <div class="col-8 col-sm-4">
                <img src="{{ asset($comic->image) }}" alt="" height="400px" width="300px">
            </div>
            <div class="col-4 col-sm-8">
                <div class="row py-3 px-lg-5">
                    <h2>Pavadinimas: {{$comic->title}}</h2>
                </div>
                <div class="row py-3 px-lg-5">
                    <p>Autorius: {{$comic->author}}</p>
                </div>
                <div class="row py-3 px-lg-5">
                    <p>Aprašymas: {{$comic->description}}</p>
                </div>
                <div class="row py-3 px-lg-5">
                    <p>Leidimo metai: {{$comic->year}}</p>
                </div>
                <div class="row py-3 px-lg-5">
                    <p>Puslapių skaičius: {{$comic->page}}</p>
                </div>
                <div class="row py-3 px-lg-5">
                    <p>Žanras: {{$comic->genre}}</p>
                </div>
                <div class="row py-3 px-lg-5">
                    <p>Leidėjas: {{$comic->publisher}}</p>
                </div>
                <div class="row py-3 px-lg-5">
                    <p>ISBN: {{$comic->isbn}}</p>
                </div>
                <div class="row py-3 px-lg-5">
                    <p>Kaina: &euro;{{$comic->price}}</p>
                </div>
                <div class="row py-3 px-lg-5">
                    <p><a class="btn btn-success" href="/add-to-cart/{{$comic->id}}" role="button" >Į krepšelį</a></p>
                </div>
            </div>
        </div>
        <br>
        <div class="row">
            @if(Auth::id() == 1)
                <a href="/comic/{{$comic->id}}/edit" role="button" class="btn btn-warning">Redaguoti</a>
                <a href="/comic/{{$comic->id}}/delete" role="button" class="btn btn-danger">Ištrinti</a>
            @endif
            <div class="reviews">
                <h4>Atsiliepimai:</h4>
                <ul class="list-group">
                    @foreach($comic->reviews as $review)
                        <li class="list-group-item"><strong>{{$review->created_at}}</strong> {{$review->body}}</li>
                    @endforeach
                </ul>
            </div>

            <hr>
            @if(Auth::check())
                <div class="card">
                    <div class="card-block">
                        <form action="/comic/{{$comic->id}}/review" method="Post">
                            {{csrf_field()}}
                            <div class="form-group">
                                <textarea name="body" placeholder="Atsiliepimo vieta..." class="form-control" required="required" maxlength="255"></textarea>
                            </div>
                            <div class="form-group">
                                <button type="submit" class="btn btn-success">Skelbti</button>
                            </div>
                        </form>
                    </div>
                </div>
                @endif
        </div>
@endsection