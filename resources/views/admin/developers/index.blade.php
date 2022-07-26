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
            <label for="language" class="form-label">Cerca sviluppatori:</label>
            <select @change="filtra" name="language_id" id="language" class="form-control" v-model="selectedLanguage">
                <option value="nulla">Seleziona il linguaggio</option>
                @foreach ($languages as $language)
                    <option value="{{$language->id}}">{{$language->name}}</option>
                @endforeach
            </select>
            <label for="rate">Seleziona il voto minimo</label>
            <select @change="filtra" name="rate_id" id="rate" class="form-control" v-model="selectedRate">
                <option value="0">Profili con nessuna recensione inclusa</option>
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
        <div class="col-sm-6 col-md-4 col-xl-3" v-for="(developer, index) in developers">
            {{-- <img class="rounded-pill" src=" {{ asset('storage/' . developer.photo) }} " alt="W"> --}}
            {{-- <img src=" {{ asset('storage/' . developer.curriculum) }} " alt="Curriculum Vitae"> --}}
            <div class="card-container m-3">
                <div class="img-container d-flex justify-content-center">
                    <a class="text-decoration-none text-reset" :href="'http://127.0.0.1:8000/admin/developers/' + developer.id">
                        <img class="round rounded-circle" :src="developer.photo !== null ? '/storage/' + developer.photo : '/img/project-user.png'" :alt="developer.name + ' ' + developer.surname">
                    </a>
                </div>
                <a class="text-decoration-none text-reset" :href="'http://127.0.0.1:8000/admin/developers/' + developer.id">
                    <h3>@{{ developer.name}} <br> @{{developer.surname }}</h3>
                </a>
                <div class="rating">
                    <div>
                        <p>
                            <i v-for="n in Math.round(developer.media)" class="fa-solid fa-certificate yellow"></i>
                            <i v-for="n in 5 - Math.round(developer.media)" class="fa-solid fa-certificate grey"></i>
                        </p>
                    </div>
                    <div>
                        <p v-if="developer.numRev != 0 && developer.numRev != 1">Recensioni: @{{ developer.numRev / 2 }}</p> 
                        <p v-else>Recensioni: @{{ developer.numRev}}</p> 
                    </div>
                </div>             
            </div>
        </div>
    </div>
</div>
@endsection