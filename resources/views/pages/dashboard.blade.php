@extends('layout/main')

@section('content')
    <h1>Administratoriaus panelė</h1>
    <hr>
    <div class="container">
        <p><a href="/new-post" role="button" class="btn btn-default">Pridėti naujieną</a></p>
        <p><a href="/new-comic" role="button" class="btn btn-default">Pridėti komiksą</a></p>
        <div class="row">
            <div class="navbar">
                <h2><a class="navbar-brand" href="/admin"><u>Naujienos</u></a></h2>
                <h2><a class="navbar-brand" href="/admin-comics">Komiksai</a></h2>
            </div>

            <table class="table table-bordered">
                <tr>
                    <th>Kategorija</th>
                    <th>Pavadinimas</th>
                    <th>Turinys</th>
                    <th>Naujiena sukurta</th>
                    <th>Naujiena atnaujinta</th>
                    <th>Veiksmai</th>
                </tr>
                @foreach($posts as $post)
                    @if(Auth::id() == $post->user_id)
                        <tr>
                            <td>{{$post->category}}</td>
                            <td>{{$post->title}}</td>
                            <td>{{$post->body}}</td>
                            <td>{{$post->created_at}}</td>
                            <td>{{$post->updated_at}}</td>
                            <td>
                                <p>
                                    <a class="btn btn-default" href="post/{{$post->id}}" role="button" >Daugiau</a>
                                    <a href="/post/{{$post->id}}/edit" role="button" class="btn-warning btn">Keisti</a>
                                    <a href="/post/{{$post->id}}/delete" role="button" class="btn-danger btn">Ištrinti</a>
                                </p>
                            </td>
                        </tr>
                    @endif
                @endforeach
            </table>
        </div>
    </div>
@endsection