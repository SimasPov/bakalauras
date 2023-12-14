@extends('layout/main')

@section('content')
    <h1>Forumas</h1>
    <hr>
    <p><a class="btn btn-default" href="{{ url("new-forum-post") }}">Sukurti diskusiją</a></p>
    <div class="dropdown">
        <a class="dropdown-toggle btn btn-default" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">
            Pasirinkti kategoriją <span class="caret"></span>
        </a>
        <ul class="dropdown-menu">
            @foreach($posts as $post)
                <li><a class="dropdown-item" href="/forum/{{$post->category}}">{{$post->category}}</a></li>
            @endforeach
        </ul>
    </div>
    <hr>
    @foreach($cats as $cat)
        <div class="col-md-4">
            <h2>{{str_limit($cat->title, 25)}}</h2>
            <p>{{str_limit($cat->body, 100)}}</p>
            <p><a class="btn btn-default" href="/forum/post/{{$cat->id}}" role="button" >Daugiau <span class="glyphicon glyphicon-chevron-right"></span></a></p>
        </div>
    @endforeach
@endsection