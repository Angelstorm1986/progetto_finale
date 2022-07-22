@extends('layouts.app')

@section('title', $user->name . '  ' . $user->surname)

@section('content')
    <div class="container">
        <div >
            <img class="rounded-pill" src=" {{ asset('storage/' . $developer->photo) }} " alt="{{ $user->name }} {{ $user->surname }}">
            <h1>{{ $user->name }} {{ $user->surname }}</h1>
            <img src=" {{ asset('storage/' . $developer->curriculum) }} " alt="Curriculum Vitae">
            <p>{{ $developer->description }}</p>
            <p>{{ $developer->skills }}</p>
            <span>{{ $developer->phone_number }}</span>
            <div id="comment">
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
                        <button class="btn btn-warning" v-if="content.length > 10 && mail.includes('@', '.') && nome.includes(' ') && nome.substr(-1) != ' ' && nome.substr(0, 1) != ' '"><strong>Save</strong></button>
                    </div>
                    
                </form>
            </div>

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
                    <button class="btn btn-warning" v-if="mail.includes('@', '.') && nome.includes(' ') && nome.substr(-1) != ' ' && nome.substr(0, 1) != ' '"><strong>Save</strong></button>
                </div>
            </form>
    </div>
@endsection
