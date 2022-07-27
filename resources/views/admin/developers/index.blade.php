@extends('layouts.app')

@section('title', 'BDevelopers - Home')

@section('content')

<div class="jumbotron">
    <div class="cover">
        <div class="positioner">
            <h1 class="display-1">[BD]</h1>
            <h1>Il portale che ti permette di cercare collaboratori in tutto il mondo.</h1>
            <p class="lead">
            Cerca tra migliaia di sviluppatori e scopri quale di queste possa fare per te. <br>
            Semplice e sicuro.
            </p>
        </div>
    </div>
    <img src="{{asset('img/jumbo.png')}}" alt="Jumbotron-pixel-art-night-city-lights-clouds-stars">
</div>
<div class="container">
    <div class="cards my-5 d-md-flex">
        <div class="square flex-column">
            {{-- <img src="{{asset('img/search.png')}}" alt="Cerca"> --}}
            <i class="fa-brands fa-searchengin"></i>
            <p class="lead d-md-none">Cerca</p>
            <div class="comparsa">
                <p>
                    Cerca tra migliaia di sviluppatori e linguaggi. Back-end o Front-end non fa differenza, da noi sono registrati tutti i tipi di developers!
                </p>
            </div>
        </div>
        <div class="square flex-column">
            {{-- <img src="{{asset('img/contact.jpg')}}" alt="Contatta"> --}}
            <i class="fa-brands fa-mailchimp"></i>
            <p class="lead d-md-none">Contatta</p>
        </div>
        <div class="square flex-column">
            {{-- <img src="{{asset('img/reviews.jpg')}}" alt="Recensisci"> --}}
            <i class="fa-solid fa-star"></i>
            <p class="lead d-md-none">Recensisci</p>
        </div>
    </div>
    <div class="d-none d-md-flex justify-content-around">
        <p class="lead">Cerca</p>
        <p class="lead">Contatta</p>
        <p class="lead">Recensisci</p>
    </div>
    <form action="" method="post">
        <div class="form-group flex-column flex-xl-row">
            <div>
                <label for="language" class="form-label">Cerca sviluppatori:</label>
                <select @change="filtra" name="language_id" id="language" class="form-control" v-model="selectedLanguage">
                    <option value="nulla">Seleziona il linguaggio</option>
                    @foreach ($languages as $language)
                        <option value="{{$language->id}}">{{$language->name}}</option>
                    @endforeach
                </select>
            </div>
            <div>
                <label for="rate">Seleziona il voto minimo</label>
                <select @change="filtra" name="rate_id" id="rate" class="form-control" v-model="selectedRate">
                    <option value="0">Profili con nessuna recensione inclusa</option>
                    <option value="1">1</option>
                    <option value="2">2</option>
                    <option value="3">3</option>
                    <option value="4">4</option>
                    <option value="5">5</option>
                </select>
            </div>
            <div>
                <label for="rate">Seleziona il numero di recensioni minimo</label>
                <select @change="filtra" name="review_id" id="review" class="form-control" v-model="selectedNumber">
                    <option value="0">profili con nessuna recensione inclusa</option>
                    <option value="10">5</option>
                    <option value="20">10</option>
                    <option value="40">20</option>
                    <option value="80">40</option>
                    <option value="100">50</option>
                </select>
            </div>
        </div>
    </form>
    <div class="row" v-if="developers.length > 0">
        <div class="col-sm-12 col-md-6 col-lg-3 col-xl-3" v-if="developers" v-for="(developer, index) in developers">
            {{-- <img class="rounded-pill" src=" {{ asset('storage/' . developer.photo) }} " alt="W"> --}}
            {{-- <img src=" {{ asset('storage/' . developer.curriculum) }} " alt="Curriculum Vitae"> --}}
            <div class="card-container m-3">
                <div class="img-container d-flex justify-content-center">
                    <a class="text-decoration-none text-reset" :href="'http://127.0.0.1:8000/admin/developers/' + developer.id">
                        <img class="round rounded-circle" :src="developer.photo !== null ? '/storage/' + developer.photo : '/img/1024x1024bb.png'" :alt="developer.name + ' ' + developer.surname">
                    </a>
                </div>
                <a class="text-decoration-none text-reset" :href="'http://127.0.0.1:8000/admin/developers/' + developer.id">
                    <h4 class="text-truncate">@{{ developer.name}} <br> @{{developer.surname }}</h4>
                </a>
                <div class="rating">
                    <div>
                        <p>
                            <i v-for="n in Math.round(developer.media)" class="fa-solid fa-certificate yellow"></i>
                            <i v-for="n in 5 - Math.round(developer.media)" class="fa-solid fa-certificate grey"></i>
                        </p>
                    </div>
                    <div>
                        <p v-if="developer.numRev != 0 && developer.numRev != 1 && developer.numRev != 3">Recensioni: @{{ developer.numRev / 2 }}</p> 
                        <p v-else>Recensioni: @{{ developer.numRev}}</p> 
                    </div>
                </div>             
            </div>
        </div>
    </div>
    <div class="empty" v-else>
        <div class="face">
            <p>:(</p>
        </div>
        <div class="warn">
            <h1>Non ci sono utenti compatibili.</h1>
            <h3>Ci dispiace, Prova un'altra ricerca!</h3>
        </div>
    </div>
</div>
@endsection