@extends('layout/main')


@section('content')
    <h1>Komiksai</h1>
    <div class="input-group">
        <form action="{{ route('search') }}" method="GET" class="form-inline">
            @csrf
            <div class="form-group">
                <input class="form-control rounded" placeholder="Ieškoti" type="text" name="search" required/>
            </div>
            <div class="form-group">
                <button class="btn btn-outline-primary" type="submit">Ieškoti</button>
            </div>
        </form>
    </div>
    <hr>
    @foreach($comics as $comic)
        <div class="col-md-4">
            <div class="card">
                <img src="{{ asset($comic->image) }}" class="card-img-top" style="width: 18rem;" alt="Comic image"/>
                <div class="card-body">
                    <h2 class="card-title">{{str_limit($comic->title, 25)}}</h2>
                    <p class="card-text">{{str_limit($comic->price, 10)}}</p>
                    <p><a class="btn btn-primary" href="comic/{{$comic->id}}" role="button" >Daugiau <span class="glyphicon glyphicon-chevron-right"></span></a></p>
                    <p><a class="btn btn-success" href="/add-to-cart/{{$comic->id}}" role="button" >Pridėti į krepšelį</a></p>
                </div>
            </div>
        </div>
    @endforeach
    {{$comics->links()}}
@endsection