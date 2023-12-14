@extends('layout/main')

@section('content')
    <h1>Forumo diskusijos sukūrimas</h1>
    <hr>
    @include('includes/errors')
    <form method="POST" action="/new-forum-post/publish" class="form-horizontal">
        {{csrf_field()}}
        <div class="form-group">
            <label for="category" class="col-sm-2 control-label">Kategorija</label>
            <div class="col-sm-10">
                <input type="text" class="form-control" name="category" id="category">
            </div>
        </div>
        <div class="form-group">
            <label for="title" class="col-sm-2 control-label">Pavadinimas</label>
            <div class="col-sm-10">
                <input type="text" class="form-control" name="title" id="title">
            </div>
        </div>
        <div class="form-group">
            <label for="body" class="col-sm-2 control-label">Turinys</label>
            <div class="col-sm-10">
                <textarea name="body" id="body" class="form-control" rows=""></textarea>
            </div>
        </div>
        <div class="form-group">
            <div class="col-sm-offset-2 col-sm-10">
                <button class="btn btn-success" type="submit">Skelbti</button>
            </div>
        </div>
    </form>
@endsection