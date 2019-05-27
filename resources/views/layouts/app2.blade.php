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
    <div id="app">
        <div class="container-fluid">
            <div class="first-part">
                <nav class="navbar navbar-expand-lg navbar-light bg-light-nav">
                    <a class="navbar-brand" href="#" style="margin-left: 5%;"><img src="{{ url('images/logo.png') }}" style="width:32%"></a>
                    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                        <span class="navbar-toggler-icon"></span>
                    </button>

                    <div class="collapse navbar-collapse" id="navbarSupportedContent">
                        <ul class="navbar-nav mr-auto">
                            <li class="nav-item active">
                                <a class="nav-link" href="#">Accueil <span class="sr-only">(current)</span></a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" href="#">Bibliothèque</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" href="#">A propos</a>
                            </li>
                        </ul>
                        <ul class="navbar-nav mr-auto">
                            <li class="nav-item" style="padding-right: 13%;margin-left: 148%;">
                                <a class="nav-link" href="#">Connexion</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" href="#">S'enregister</a>
                            </li>
                        </ul>
                    </div>
                </nav>

                <div class="content-wrapper">
                    @yield('content')
                </div>







            </div>

        </div>
    </div>
</body>

<script src="js/vue.js"></script>
<script src="js/axios.js"></script>
@yield('scripts')

</html>