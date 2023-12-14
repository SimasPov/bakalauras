@extends('layout/main')

@section('content')
    <h1>Administratoriaus panelė</h1>
    <hr>
    <div class="container">
        <p><a href="/new-post" role="button" class="btn btn-default">Pridėti naujieną</a></p>
        <p><a href="/new-comic" role="button" class="btn btn-default">Pridėti komiksą</a></p>
        <div class="row">
            <div class="navbar">
                <h2><a class="navbar-brand" href="/admin">Naujienos</a></h2>
                <h2><a class="navbar-brand" href="/admin-comics"><u>Komiksai</u></a></h2>
            </div>
            <table class="table table-bordered">
                <tr>
                    <th>ISBN</th>
                    <th>Pavadinimas</th>
                    <th>Autorius</th>
                    <th>Leidimo metai</th>
                    <th>Žanrai</th>
                    <th>Leidėjas</th>
                    <th>Kaina</th>
                    <th>Komiksas sukurtas</th>
                    <th>Komiksas atnaujintas</th>
                    <th>Veiksmai</th>
                </tr>
                @foreach($comics as $comic)
                    @if(Auth::id() == 1)
                        <tr>
                            <td>{{$comic->isbn}}</td>
                            <td>{{$comic->title}}</td>
                            <td>{{$comic->author}}</td>
                            <td>{{$comic->year}}</td>
                            <td>{{$comic->genre}}</td>
                            <td>{{$comic->publisher}}</td>
                            <td>{{$comic->price}}</td>
                            <td>{{$comic->created_at}}</td>
                            <td>{{$comic->updated_at}}</td>
                            <td>
                                <p>
                                    <a class="btn btn-default" href="comic/{{$comic->id}}" role="button" >Daugiau</a>
                                    <a href="/comic/{{$comic->id}}/edit" role="button" class="btn-warning btn">Keisti</a>
                                    <a href="/comic/{{$comic->id}}/delete" role="button" class="btn-danger btn">Ištrinti</a>
                                </p>
                            </td>
                        </tr>
                    @endif
                @endforeach
            </table>
        </div>
    </div>
@endsection