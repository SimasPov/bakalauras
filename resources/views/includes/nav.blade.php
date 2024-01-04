<nav class="navbar navbar-inverse navbar-fixed-top">
    <div class="container-fluid">
        <div class="navbar-header">
            <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar" aria-expanded="false" aria-controls="navbar">
                <span class="sr-only">Toggle navigation</span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
            </button>
            <a class="navbar-brand" href="/"><span class="glyphicon glyphicon-home"></span> Komiksų svetainė</a>
            <a class="navbar-brand" href="/news">Naujienos</a>
            <a class="navbar-brand" href="/about">Apie komiksus</a>
            <a class="navbar-brand" href="/forum">Forumas</a>
        </div>
        <ul class="nav navbar-nav navbar-right">
            <li>
                <a id="navbarDropdown" class="nav-link" href="/shopping-cart">
                    <span class="cart">Krepšelis</span>
                    <span class="badge">{{ Session::has('cart') ? Session::get('cart')->totalQty : '' }}</span>
                </a>
            </li>
        </ul>
        @if(Auth::check())
            <div class="dropdown show navbar-right">
                <a class="dropdown-toggle navbar-brand" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">
                    {{ucfirst(Auth::user()->name)}} <span class="caret"></span>
                </a>
                <ul class="dropdown-menu">
                    @if(Auth::id() == 1)
                    <li><a class="dropdown-item" href="/new-post">Nauja naujiena</a></li>
                    <li><a class="dropdown-item" href="/new-comic">Naujas komiksas</a></li>
                    <li><a class="dropdown-item" href="/admin">Valdymas</a></li>
                    <li><a class="dropdown-item" href="/orders">Užsakymai</a></li>
                    <li role="separator" class="divider"></li>
                    <li><a class="dropdown-item" href="/logout">Atsijungti</a></li>
                    @else
                        <li><a class="dropdown-item" href="/logout">Atsijungti</a></li>
                    @endif
                </ul>
            </div>
        @else
            <div id="navbar" class="navbar-collapse collapse">
                <form method="POST" action="{{ route('login') }}" class="navbar-form navbar-right">
                    @csrf
                    <div class="form-group">
                        <input id="email" type="email" name="email" class="form-control{{ $errors->has('email') ? ' is-invalid' : '' }}" value="{{ old('email') }}" required="required" autofocus="autofocus" placeholder="El. paštas">
                    </div>
                    <div class="form-group">
                        <input id="password" type="password" name="password" required="required" class="form-control{{ $errors->has('password') ? ' is-invalid' : '' }}" placeholder="Slaptažodis">
                    </div>
                    <div class="form-group">
                        <button type="submit" class="btn btn-primary">
                            {{ __('Prisijungti') }}
                        </button>
                        <a href="/register" class="btn btn-primary">Registruotis</a>
                    </div>
                </form>
            </div>
        @endif

        @if ($errors->has('email'))
            <div class="invalid-feedback alert alert-warning">
                <strong>{{ $errors->first('email') }}</strong>
            </div>
        @endif
        @if ($errors->has('password'))
            <div class="invalid-feedback alert alert-warning">
                <strong>{{ $errors->first('password') }}</strong>
            </div>
        @endif
    </div>
</nav>