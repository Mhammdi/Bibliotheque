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
    <a href="#" style="color: black;text-decoration: none;margin-left: 20%;">Recommanded</a>
  </div>
  <div class="col-sm" style="margin-left: -24%;"><span>|</span></div>
  <div class="col-sm">
    <a href="#" style="color: black;text-decoration: none;margin-left: -99.5%;">Last updated</a>
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
@endsection

@section('scripts')

<script>
  Vue.config.devtools = true;
  new Vue({
    el: "#app",
    data: {
      id: 0,
      ouvrages: {
        id: "",
        titre: "",
        editeur: "",
        domaine: "",
        stock: "",
        site: "",
        photo: "",
      },
    },
    methods: {
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
    mounted: function() {
      this.getOuvrages();
    }

  });
</script>





@endsection