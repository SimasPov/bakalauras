@extends('layout/main')

@section('content')
    <h1>Komikso redagavimas</h1>
    <hr>
    @include('includes/errors')
    <form method="POST" action="/comic/{{$comic->id}}/update" enctype="multipart/form-data" class="form-horizontal" >
        {{csrf_field()}}
        {{method_field('PATCH')}}
        <div class="form-group">
            <label for="isbn" class="col-sm-2 control-label">ISBN</label>
            <div class="col-sm-10">
                <input type="text" class="form-control" name="isbn" id="isbn" value="{{$comic->isbn}}">
            </div>
        </div>
        <div class="form-group">
            <label for="title" class="col-sm-2 control-label">Pavadinimas</label>
            <div class="col-sm-10">
                <input type="text" class="form-control" name="title" id="title" value="{{$comic->title}}">
            </div>
        </div>
        <div class="form-group">
            <label for="author" class="col-sm-2 control-label">Autorius</label>
            <div class="col-sm-10">
                <input name="author" id="author" class="form-control" type="text" value="{{$comic->author}}">
            </div>
        </div>
        <div class="form-group">
            <label for="page" class="col-sm-2 control-label">Puslapių skaičius</label>
            <div class="col-sm-10">
                <input name="page" id="page" class="form-control" type="number" value="{{$comic->page}}">
            </div>
        </div>
        <div class="form-group">
            <label for="year" class="col-sm-2 control-label">Leidimo metai</label>
            <div class="col-sm-10">
                <input name="year" id="year" class="form-control" type="number" value="{{$comic->year}}">
            </div>
        </div>
        <div class="form-group">
            <label for="price" class="col-sm-2 control-label">Kaina</label>
            <div class="col-sm-10">
                <input name="price" id="price" class="form-control" type="number" min="0" value="{{$comic->price}}">
            </div>
        </div>
        <div class="form-group">
            <label for="genre" class="col-sm-2 control-label">Žanras</label>
            <div class="col-sm-10">
                <input name="genre" id="genre" class="form-control" type="text" value="{{$comic->genre}}">
            </div>
        </div>
        <div class="form-group">
            <label for="publisher" class="col-sm-2 control-label">Leidėjas</label>
            <div class="col-sm-10">
                <input name="publisher" id="publisher" class="form-control" type="text" value="{{$comic->publisher}}">
            </div>
        </div>
        <div class="form-group">
            <label for="image" class="col-sm-2 control-label">Nuotrauka</label>
            <div class="col-sm-10">
                <input name="image" id="image" class="form-control" type="file" required>
            </div>
        </div>
        <div class="form-group">
            <div class="col-sm-offset-2 col-sm-10">
                <button class="btn btn-success" type="submit">Skelbti</button>
            </div>
        </div>
    </form>
@endsection