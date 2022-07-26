@extends('layouts.app')

@section('title', 'BDevelopers - Home')

@section('content')

<div class="jumbotron">
    <img src="{{asset('img/pixel-art-night-city-lights-clouds-stars-hd-wallpaper-preview.jpg')}}" alt="Jumbotron-pixel-art-night-city-lights-clouds-stars">
</div>
<div class="container">
    <div class="cards my-5">
        <div class="square">
            <img src="{{asset('img/search.png')}}" alt="Cerca">
            <h6>Cerca</h6>
        </div>
        <div class="square square-center">
            <img src="{{asset('img/contact.jpg')}}" alt="Contatta">
            <h6>Contatta</h6>
        </div>
        <div class="square">
            <img src="{{asset('img/reviews.jpg')}}" alt="Recensisci">
            <h6>Recensisci</h6>
        </div>
    </div>
    <form action="" method="post">
        <div class="form-group">
            <label for="language" class="form-label">Search developers from languages:</label>
            <select @change="filtra" name="language_id" id="language" class="form-control" v-model="selectedLanguage">
                <option value="nulla">Select Language</option>
                @foreach ($languages as $language)
                    <option value="{{$language->id}}">{{$language->name}}</option>
                @endforeach
            </select>
            <label for="rate">Seleziona il voto minimo</label>
            <select @change="filtra" name="rate_id" id="rate" class="form-control" v-model="selectedRate">
                <option value="0">profili con nessuna recensione inclusa</option>
                <option value="1">1</option>
                <option value="2">2</option>
                <option value="3">3</option>
                <option value="4">4</option>
                <option value="5">5</option>
            </select>
            <label for="rate">Seleziona il numero di recensioni minimo</label>
            <select @change="filtra" name="review_id" id="review" class="form-control" v-model="selectedNumber">
                <option value="0">profili con nessuna recensione inclusa</option>
                <option value="5">5</option>
                <option value="10">10</option>
                <option value="20">20</option>
                <option value="40">40</option>
                <option value="50">50</option>
            </select>
        </div>
    </form>      
    <div class="row">
        <div class="col-sm-12 col-md-6 col-xl-4" v-for="(developer, index) in developers">
            {{-- <img class="rounded-pill" src=" {{ asset('storage/' . developer.photo) }} " alt="W"> --}}
            {{-- <img src=" {{ asset('storage/' . developer.curriculum) }} " alt="Curriculum Vitae"> --}}
            <p>@{{developer.name}} @{{developer.surname}}</p>
            <span>@{{ developer.phone_number }}</span>
            <a :href=" 'http://127.0.0.1:8000/guest/developers/' + developer.id">Visualizza il profilo dello sviluppatore</a>
        </div>
        <a class="text-decoration-none text-reset" href="">
            <h3>@{{ developer.name + ' ' + developer.surname }}</h3>
        </a>
        <p>@{{ developer.media }}</p>
        <p>@{{ developer.numRev }}</p>              
        <div class="buttons my-2">
            <button class="primary">
                Message
            </button>
            <button class="primary ghost">
                Reviews
            </button>
        </div>
    </div>
</div>

<?php
?>

@endsection