@extends('layouts.app')

@section('title', $user->name . '  ' . $user->surname)

@section('content')
    <select name="idDev" id="idDev" class="d-none">
        <option value="{{$developer->id}}" selected="selected">{{$developer->id}}</option>
    </select>
    <div class="container">
        <div class="card-container shower">
                @if($developer->photo)
                <img class="round" src=" {{ asset('storage/' . $developer->photo) }} " alt="{{ $user->name }} {{ $user->surname }}">
                @else
                <img class="round" src=" {{ asset('img/1024x1024bb.png') }} " alt="{{ $user->name }} {{ $user->surname }}">
                @endif
                <h3>{{ $user->name }} <br> {{ $user->surname }}</h3>     
            <h6>{{ $user->address }}</h6>
            @if($developer->phone_number)
            <span class="phone"><small>Numero di telefono: {{ $developer->phone_number }}</small></span>
            @endif
            
            <div class="skills">
                <h6>Descrizione:</h6>
                @if($developer->description)
                <p>{{ $developer->description }}</p>
                @else
                <p>Nessuna descrizione</p>
                @endif
                <h6>Capacità:</h6>
                @if($developer->skills )
                <p><strong>{{ $developer->skills }}</strong></p>
                @else
                <p><strong>Nessuna capacità inserita</strong></p>
                @endif
                <div class="language">
                    <h6>Linguaggi:</h6>
                    @if($developer->languages)
                    <ul>
                        @foreach ($developer->languages as $language)
                            <li>{{$language->name}}</li>
                        @endforeach
                    </ul>
                    @else
                    <ul>
                            <li>Questo profilo non ha linguaggi</li>
                    </ul>
                    @endif
                </div> 
                <h6>Curriculum:</h6>
            </div>
        </div>

            <div class="flex-title">
                <h3>Commenti:</h3>
                <button class="btn-warning" @click="visualFormCom" v-if="createComment == false">Invia un commento</button>
                <button class="btn-warning" @click="visualFormCom" v-else>Nascondi sezione commenti</button>
            </div>
            <div id="comment" v-if="createComment == true">
                <form action="{{ route('guest.messages.store') }}" method="POST" class="boot" enctype="multipart/form-data">
                    <h4 class="text-center text-uppercase">inserisci un commento</h4>
                    @csrf
                    <input type="text"  class="form-control d-none" id="developer_id" value="{{$developer->id}}" name="developer_id"> 
                    <div class="mb-3 row justify-content-center">
                        <div class="col-sm-8">
                            <label for="name" class="col-sm-8 col-form-label">Name:</label>
                            <input type="text" class="form-control @error('name') is-invalid @enderror" id="name" placeholder="Inserisci il tuo nome" name="name" value="{{is_null(Auth::user()) ? '' : $user->name.$user->surname}}" v-model.lazy="nome">
                            <span v-if="checkName == true">
                                <strong>Ricordati di inserire nome e cognome</strong>
                            </span>
                        </div>
                        <div class="col-sm-8">
                            <label for="mail" class="col-sm-4 col-form-label">Mail: </label>
                            <input type="text" class="form-control @error('mail') is-invalid @enderror" id="mail" name="mail" value="" v-model.lazy="mail" placeholder="Inserisci la tua mail">
                                <span v-if="checkMail == true">
                                    <strong>La mail inserita non è valida</strong>
                                </span>
                        </div>
                        <div class="col-sm-8">
                            <label for="content" class="col-sm-4 col-form-label">Content:</label>
                            <textarea name="content" type="text" cols="50" rows="10" class="form-control @error('content') is-invalid @enderror" id="content" placeholder="Inserisci il commento" v-model.lazy="content">
                            </textarea>
                        </div>
                    </div>
                    
                    <div class="d-flex justify-content-center pb-5">
                        <button class="btn-warning" v-if="content.length > 10 && mail.includes('@', '.') && nome.includes(' ') && nome.substr(-1) != ' ' && nome.substr(0, 1) != ' '"><strong>Save</strong></button>
                    </div>
                    
                </form>
            </div>
            <div v-if="comments.length > 0">
                <hr>
                <div class="comment-show skills" v-for="(comment, index) in comments">
                    <p class="nomi h-4">@{{comment.name}}</p>
                    <p class="commento ">@{{comment.content}}</p>
                </div>
                <hr>
            </div>
            <div class="empty" v-else>
                <div class="face">
                    <p>:(</p>
                </div>
                <div class="warn">
                    <h1>Non ci sono commenti per questo utente.</h1>
                    <h3>Sii il primo a scrivere un commento!</h3>
                </div>
            </div>


            <div class="flex-title">
                <h3>Recensioni:</h3>
                <button class="btn-warning" @click="visualFormRev" v-if="createRev == false">Invia una recensione</button>
                <button class="btn-warning" @click="visualFormRev" v-else>Nascondi sezione recensioni</button>
            </div>
            <div id="rev" v-if="createRev == true">
                <form action="{{ route('guest.reviews.store') }}" method="POST" class="boot" enctype="multipart/form-data">
                    <h4 class="text-center text-uppercase">inserisci una recensione</h4>
                    @csrf
                    <input type="text"  class="form-control d-none" id="developer_id" value="{{$developer->id}}" name="developer_id"> 
                    <div class="mb-3 row justify-content-center">
                        <div class="col-sm-8">
                            <label for="name" class="col-sm-8 col-form-label">Name:</label>
                            <input type="text" class="form-control @error('name') is-invalid @enderror" id="name" placeholder="Inserisci il tuo nome" name="name" value="" v-model.lazy="nome">
                            <span v-if="checkName == true">
                                <strong>Ricordati di inserire nome e cognome</strong>
                            </span>
                        </div>
                        <div class="col-sm-8">
                            <label for="rate" class="col-sm-4 col-form-label">Rate:</label>
                            <select name="rate" id="rate" class="form-control">
                                <option value="1">1</option>
                                <option value="2">2</option>
                                <option value="3">3</option>
                                <option value="4">4</option>
                                <option value="5">5</option>
                            </select>
                        </div>
                        <div class="col-sm-8">
                            <label for="content" class="col-sm-4 col-form-label">Content:</label>
                            <textarea name="content" type="text" cols="50" rows="10" class="form-control @error('content') is-invalid @enderror" id="content" placeholder="Inserisci il commento">
                            </textarea>
                        </div>
                    </div>
                    <div class="d-flex justify-content-center">
                        <button class=" btn-warning" v-if="nome.includes(' ') && nome.substr(-1) != ' ' && nome.substr(0, 1) != ' '"><strong>Save</strong></button>
                    </div>
                </form>
            </div>
            <div v-if="reviews.length > 0">
                <hr>
                <div class="comment-show skills" v-for="(review, index) in reviews">
                    <p class="nomi h-4">@{{review.name}}</p>
                    <p>@{{review.rate}}</p>
                    <p class="commento ">@{{review.content}}</p>
                </div>
                <hr>
            </div>
            <div class="empty" v-else>
                <div class="face">
                    <p>:(</p>
                </div>
                <div class="warn">
                    <h1>Non ci sono recensioni per questo utente.</h1>
                    <h3>Sii il primo a dare una valutazione!</h3>
                </div>
            </div>
    </div>
@endsection

