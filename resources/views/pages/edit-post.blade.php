@extends('layout/main')

@section('content')
    <h1>Naujienos redagavimas</h1>
    <hr>
    @include('includes/errors')
    <form method="POST" action="/post/{{$post->id}}/update" class="form-horizontal">
        {{csrf_field()}}
        {{method_field('PATCH')}}
        <div class="form-group">
            <label for="category" class="col-sm-2 control-label">Kategorija</label>
            <div class="col-sm-10">
                <input type="text" class="form-control" name="category" id="category" value="{{$post->category}}">
            </div>
        </div>
        <div class="form-group">
            <label for="title" class="col-sm-2 control-label">Pavadinimas</label>
            <div class="col-sm-10">
                <input type="text" class="form-control" name="title" id="title" value="{{$post->title}}">
            </div>
        </div>
        <div class="form-group">
            <label for="body" class="col-sm-2 control-label">Turinys</label>
            <div class="col-sm-10">
                <textarea name="body" id="body" class="form-control" rows="">{{$post->body}}</textarea>
            </div>
        </div>
        <div class="form-group">
            <div class="col-sm-offset-2 col-sm-10">
                <button class="btn btn-default" type="submit">Skelbti</button>
            </div>
        </div>
    </form>
@endsection