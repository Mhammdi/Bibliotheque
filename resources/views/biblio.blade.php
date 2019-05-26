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


      <form class="form-inline my-2 my-lg-0" id="flexContainer" style="margin-left: 21%;padding-top: 6%; ">
        <input class="form-control mr-sm-2" id="inputField" type="search" placeholder="Chercher un livre" aria-label="Search" style="margin-left: 6%;width: 50%;height: 3em;box-shadow: -2px 9px 48px rgba(0, 0, 0, 0.15); border: 1px;">
        <button class="btn btn-outline-success my-2 my-sm-0" type="submit" id="search-btn" style="margin-left: -10%;background-color: white;border: 1px;height: 3em;box-shadow: -2px 9px 48px rgba(0, 0, 0, 0.15);">Chercher un livre</button>
        <div class="btn-group dropright">
          <button type="button" class="btn btn-secondary dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" style="margin-left: 37px;background-color: white;border: 1px;height: 3em;box-shadow: -2px 9px 48px rgba(0, 0, 0, 0.15);color: black;">
            Catégories
          </button>
          <div class="dropdown-menu">
            <button class="dropdown-item" type="button">cat1</button>
            <button class="dropdown-item" type="button">cat2</button>
            <button class="dropdown-item" type="button">cat3</button>
          </div>
        </div>
      </form>

      <div class="row" style="margin-top: 4%;">
        <div class="col-sm">
          <a href="#" style="color: black;text-decoration: none;margin-left: 20%;">Recommanded</a>
        </div>
        <div class="col-sm" style="margin-left: -24%;"><span>|</span></div>
        <div class="col-sm">
          <a href="#" style="color: black;text-decoration: none;margin-left: -99.5%;">Last updated</a>
        </div>
      </div>



      <div class="card-columns" style="margin-left: 8.3%;column-count: 1;margin-top: 2%;">
        <div class="card" style="width: 12rem;border: 1px white;box-shadow: -2px 4px 30px rgba(14, 28, 0, 0.14);">
          <a href=""><img src="{{ url('images/art_bookcover.jpg') }}" class="card-img-top" alt="..." id="book-img">
            <div class="card-body">
              <h5 class="card-title">Card title</h5>
              <p class="card-text" style="font-size: 69%;">Some quick example text to build on the card title and make up the bulk of the card's content.</p>
            </div>
          </a>

          <center> <button id="btn-emprenter" class="btn btn-primary">Emprunter</button>
          </center>
        </div>
      </div>

    </div>
  </div>
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
  <script src="{{ asset('js/bootstrap.min.js') }}"></script>
</body>

</html>