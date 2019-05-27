<!doctype html>

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Bibliothèque UCA</title>
    <base href="{{ URL::asset('/') }}" target="_blank">
    <link rel="stylesheet" href="{{ url('css/bootstrap.min.css') }}">
    <link rel="stylesheet" href="{{ url('css/welcome.css') }}">

</head>

<body>
    <div class="container-fluid">
        <div class="first-part">
            <nav class="navbar navbar-expand-lg navbar-light bg-light-nav">
                <a class="navbar-brand" href="{{ url('/') }}" style="margin-left: 5%;"><img src="{{ url('images/logo.png') }}" style="width:32%"></a>
                <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                </button>

                <div class="collapse navbar-collapse" id="navbarSupportedContent">
                    <ul class="navbar-nav mr-auto">
                        <li class="nav-item active">
                            <a class="nav-link" href="#">Accueil <span class="sr-only">(current)</span></a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="{{ url('/biblio') }}">Bibliothèque</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="#">A prpopos</a>
                        </li>
                    </ul>
                    <ul class="navbar-nav mr-auto">
                        @if (Route::has('login'))
                        <li class="nav-item" style="padding-right: 13%;margin-left: 148%;">

                            <div class="top-right links">
                                @auth
                                <div class="pull-right">
                                    <a href="{!! url('/logout') !!}" class="btn btn-default btn-flat" onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
                                        SignOut
                                    </a>
                                    <form id="logout-form" action="{{ url('/logout') }}" method="POST" style="display: none;">
                                        {{ csrf_field() }}
                                    </form>
                                </div>
                                @else
                                <a class="nav-link" href="{{ route('login') }}">SignIn</a>
                                @endauth
                            </div>


                        </li>
                        @if (Route::has('register'))
                        <li class="nav-item">
                            <a href="{{ route('register') }}" class="nav-link" href="#">SignUp</a>
                        </li>
                        @endif
                        @endif
                    </ul>
                </div>
            </nav>
            <img src="{{ url('images/back.png') }}" class="img-back">
            <p id="text-back">
                Bienvenu au <br>bibliotheque de UCA
            </p>
            <p style="font-size: 2.5em;font-weight: lighter;font-family: inherit;margin-left: 10%;margin-top: -1%;">Livres en ligne</p>

            <p id="p1"></p>
            <p id="p2"></p>
            <p id="p3"></p>

        </div>
    </div>
</body>

</html>