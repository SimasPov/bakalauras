@extends('layout/main')


@section('content')
    <h1>Naujienos</h1>
    <div class="input-group">
        <form action="{{ route('searchNews') }}" method="GET" class="form-inline">
            @csrf
            <div class="form-group">
                <input class="form-control rounded" placeholder="Ieškoti" type="text" name="searchNews" required/>
            </div>
            <div class="form-group">
                <button class="btn btn-outline-primary" type="submit">Ieškoti</button>
            </div>
        </form>
    </div>
    <hr>
    @foreach($posts as $post)
        <div class="col-md-4">
            <h2>{{str_limit($post->title, 25)}}</h2>
            <p>{{str_limit($post->body, 100)}}</p>
            <p><a class="btn btn-primary" href="post/{{$post->id}}" role="button" >Daugiau <span class="glyphicon glyphicon-chevron-right"></span></a></p>
        </div>
    @endforeach
    {{$posts->links()}}
@endsection