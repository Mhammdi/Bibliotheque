@extends('layouts.app2')

@section('content')

<div id="getDomaine" ref="getDomaine" style="display : none;">{{$ouvrage->id}}</div>
<div class="row" style="background-color:white;height:60%;width:80%;margin:auto;margin-top:2%">
    <div class="col-3">
        <img src="{{ url($ouvrage->photo) }}" alt="" id="image-book-item">

    </div>
    <div class="col-9" id="descript-book">
        <h1>{{$ouvrage->titre}}</h1>
        <h4>{{$ouvrage->editeur}}</h4>
        <h4>{{$ouvrage->annee}}</h4>
        <span class="fa fa-star checked"></span>
        <span class="fa fa-star checked"></span>
        <span class="fa fa-star checked"></span>
        <span class="fa fa-star"></span>
        <span class="fa fa-star"></span>
        <br><br>
        <p>{{$ouvrage->description}}
        </p>
        <button class="btn btn-light" style="background-color:#74bf04;color: white">Emprunter ce livre</button>
    </div>

</div>

<hr style="border-width: 2px;width: 84%;margin-top: 3%;">

<div class="row" style="width:80%;margin:auto;margin-top:4%">
    <div class="col-sm">
        <h4 style="color: black;margin-left: 8.3%;">Livre en relation avec</h4>
    </div>
</div>

<div class="card-columns" style="margin-left: 17.3%;column-count: 1;margin-top: 1%;">

    <div v-for="ouvrage in ouvrages" class="card" id="row-cards" style="width: 9rem;border: 1px white;box-shadow: -2px 4px 30px rgba(14, 28, 0, 0.14);position: relative;">
        <a v-bind:href="getLink(ouvrage.id)"><img v-bind:src="ouvrage.photo" class="card-img-top" alt="..." id="book-img">
            <div class="card-body">
                <h5 class="card-title">@{{getTitre(ouvrage.titre)}}</h5>
                <p class="card-text" style="font-size: 69%;"></p>@{{getDescription(ouvrage.description)}}
            </div>
        </a>

        <center> <button id="btn-emprenter-detail" class="btn btn-primary">Emprunter</button>
            <center>
    </div>



</div>


@endsection

@section('scripts')

<script>
    Vue.config.devtools = true;
    new Vue({
        el: "#app",
        data: {
            domaine: "",
            ouvrages: {},
        },
        methods: {
            getOuvrages: function() {
                this.domaine = this.$refs.getDomaine.innerText;
                axios.get("http://localhost:8000/getOuvragesByDomaine", this.domaine)
                    .then(response => {
                        this.ouvrages = response.data.ouvrages;
                        console.log(response.data.ouvrages);
                    })
                    .catch(error => {
                        console.log(error)
                    })
            },
            getLink: function(link) {
                return "about" + link;
            },
            getTitre: function(titre) {
                if (titre.length > 10) {
                    return titre.substring(0, 10) + "...";
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
        },
        mounted: function() {
            this.getOuvrages();
        }

    });
</script>





@endsection