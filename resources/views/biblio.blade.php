@extends('layouts.app2')

@section('content')

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
    <button style="color: black;text-decoration: none;margin-left: 20%;" v-on:click="getRatedOuvrages()">Recommended</button>
  </div>
  <div class="col-sm" style="margin-left: -24%;"><span>|</span></div>
  <div class="col-sm">
    <button style="color: black;text-decoration: none;margin-left: -99.5%;" v-on:click="getOuvrages()">Last updated</button>
  </div>
</div>



<div class="card-columns" style="margin-left: 8.3%;column-count: 1;margin-top: 2%;">

  <div v-for="ouvrage in ouvrages" class="card " style="width: 12rem;border: 1px white;box-shadow: -2px 4px 30px rgba(14, 28, 0, 0.14);">
    <a href=""><img v-bind:src="ouvrage.photo" class="card-img-top" alt="..." id="book-img">
      <div class="card-body">
        <h5 class="card-title">@{{getTitre(ouvrage.titre)}}</h5>
        <p class="card-text" style="font-size: 69%;">@{{getDescription(ouvrage.description)}}</p>
      </div>
    </a>

    <button id="btn-emprenter" class="btn btn-primary">Emprunter</button>

  </div>


</div>
<div class="table-wrapper" style="width: 83.4%; margin-top:4%">
  <div class="table-title" style="background-color: transparent;color: black;">
    <div class="row">
      <div class="col-sm-4">
        <h2>Emprenter un <b>livre</b></h2>
      </div>
    </div>
  </div>
  <table class="table table-striped table-hover">
    <tbody>
      <tr v-for="ouvrage in ouvrages">

        <td> <a v-bind:href="getLink(ouvrage.id)"><img v-bind:src="ouvrage.photo" class="avatar" alt="Avatar"> </a></td>
        <td>@{{ouvrage.titre}}</td>
        <td>@{{ouvrage.editeur}}</td>
        <td>@{{ouvrage.domaine}}</td>
        <td>@{{ouvrage.annee}}</td>
        <td><span class="status text-success">&bull;</span> @{{disponible(ouvrage.stock)}}</td>
        <td><a href="#" class="view" title="View Details" data-toggle="tooltip"><i class="material-icons">&#xE5C8;</i></a></td>

      </tr>

    </tbody>
  </table>
  <div class="clearfix">
    <div class="hint-text">Showing <b>1</b> out of <b>25</b> entries</div>
    <ul class="pagination">
      <li class="page-item disabled"><a href="#">Previous</a></li>
      <li class="page-item"><a href="#" class="page-link">1</a></li>
      <li class="page-item"><a href="#" class="page-link">2</a></li>
      <li class="page-item"><a href="#" class="page-link">3</a></li>
      <li class="page-item active"><a href="#" class="page-link">4</a></li>
      <li class="page-item"><a href="#" class="page-link">5</a></li>
      <li class="page-item"><a href="#" class="page-link">6</a></li>
      <li class="page-item"><a href="#" class="page-link">7</a></li>
      <li class="page-item"><a href="#" class="page-link">Next</a></li>
    </ul>
  </div>
</div>
</div>
@endsection

@section('scripts')

<script>
  Vue.config.devtools = true;
  new Vue({
    el: "#app",
    data: {
      id: 0,
      ouvrages: {},
    },
    methods: {
      disponible: function(stock) {
        if (stock > 0) {
          return "disponible";
        } else {
          return "stock Complet";
        }
      },
      getLink: function(link) {
       return "about"+link;
      },
      getRatedOuvrages: function() {
        axios.get("http://localhost:8000/getRatedOuvrages")
          .then(response => {
            //this.ouvrages = response.data.ouvrages;
            this.ouvrages = response.data.ouvrages;
            console.log(this.ouvrages);

          })
          .catch(error => {
            console.log(error)
          })
      },
      imagePath: function(path) {
        //alert(path);

      },
      getTitre: function(titre) {
        if (titre.length > 20) {
          return titre.substring(0, 20) + "...";
        } else {
          return titre;
        }
      },
      getDescription: function(description) {
        if (description.length > 100) {
          return description.substring(0, 100) + "...";
        } else {
          return description;
        }
      },
      getOuvrages: function() {
        axios.get("http://localhost:8000/getOuvrages")
          .then(response => {
            this.ouvrages = response.data.ouvrages;
            console.log(this.ouvrages);
          })
          .catch(error => {
            console.log(error)
          })
      }
    },
    created: function() {
      this.getOuvrages();
      //this.getRatedOuvrages();
    }

  });
</script>





@endsection