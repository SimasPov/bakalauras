@extends('layout/main')

@section('content')
    <h1>Forumas</h1>
    <hr>
    <p><a class="btn btn-default" href="new-forum-post">Sukurti diskusiją</a></p>
    <div class="dropdown">
        <a class="dropdown-toggle btn btn-default" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">
            Pasirinkti kategoriją <span class="caret"></span>
        </a>
        <ul class="dropdown-menu">
            @foreach($cats as $cat)
                <li><a class="dropdown-item" href="/forum/{{$cat->category}}">{{$cat->category}}</a></li>
            @endforeach
        </ul>
    </div>
    <hr>
    @foreach($posts as $post)
        <div class="col-md-4">
            <h2>{{str_limit($post->title, 25)}}</h2>
            <p>{{str_limit($post->body, 100)}}</p>
            <p><a class="btn btn-primary" href="/forum/post/{{$post->id}}" role="button" >Daugiau <span class="glyphicon glyphicon-chevron-right"></span></a></p>
        </div>
    @endforeach
@endsection