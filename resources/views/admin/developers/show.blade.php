@extends('layouts.app')


    @section('title', $user->name . '  ' . $user->surname)
    

    @section('content')

    <div>
        <p>{{$developer->curriculum}}</p>
    </div>

<div id="comment">
    <form action="{{ route('admin.messages.store') }}" method="POST" class="boot" enctype="multipart/form-data">
        <h3>inserisci un commento</h3>
        @csrf
        <input type="text"  class="form-control d-none" id="developer_id" value="{{$developer->id}}" name="developer_id"> 
        <div class="mb-3 row justify-content-center">
            <label for="name" class="col-sm-8 col-form-label">Name</label>
            <div class="col-sm-8">
                <input type="text" class="form-control @error('name') is-invalid @enderror" id="name" placeholder="Inserisci il tuo nome" name="name" value="{{is_null(Auth::user()) ? '' : $user->name.$user->surname}}" v-model.lazy="nome">
                <span v-if="checkName == true">
                    <strong>Ricordati di inserire nome e cognome</strong>
                </span>
            </div>
            <div class="col-sm-8">
                <label for="mail" class="col-sm-4 col-form-label">mail: </label>
                <input type="text" class="form-control @error('mail') is-invalid @enderror" id="mail" name="mail" value="{{is_null(Auth::user()) ? '' : $user->email}}" v-model.lazy="mail" placeholder="Inserisci la tua mail">
                    <span v-if="checkMail == true">
                        <strong>La mail inserita non è valida</strong>
                    </span>
            </div>
            <div class="col-sm-8">
                <label for="content" class="col-sm-4 col-form-label">content</label>
                <textarea name="content" type="text" cols="50" rows="10" class="form-control @error('content') is-invalid @enderror" id="content" placeholder="Inserisci il commento" v-model.lazy="content">
                </textarea>
            </div>
        </div>
        <button class="btn btn-warning"><strong>Save</strong></button>
    </form>
</div>

<form action="{{ route('admin.reviews.store') }}" method="POST" class="boot" enctype="multipart/form-data">
    <h3>inserisci una recensione</h3>
    @csrf
    <input type="text"  class="form-control d-none" id="developer_id" value="{{$developer->id}}" name="developer_id"> 
    <div class="mb-3 row justify-content-center">
        <label for="name" class="col-sm-8 col-form-label">Name</label>
        <div class="col-sm-8">
            <input type="text" class="form-control @error('name') is-invalid @enderror" id="name" placeholder="Inserisci il tuo nome" name="name" value="{{is_null(Auth::user()) ? '' : $user->name.$user->surname}}" v-model.lazy="nome">
            <span v-if="checkName == true">
                <strong>Ricordati di inserire nome e cognome</strong>
            </span>
        </div>
        <div class="col-sm-8">
            <label for="rate" class="col-sm-4 col-form-label">rate</label>
            <select name="rate" id="rate" class="form-control">
                <option value="1">1</option>
                <option value="2">2</option>
                <option value="3">3</option>
                <option value="4">4</option>
                <option value="5">5</option>
            </select>
        </div>
        <div class="col-sm-8">
            <label for="content" class="col-sm-4 col-form-label">content</label>
            <textarea name="content" type="text" cols="50" rows="10" class="form-control @error('content') is-invalid @enderror" id="content" placeholder="Inserisci il commento">
            </textarea>
        </div>
    </div>
    <button class="btn btn-warning"><strong>Save</strong></button>
</form>


@endsection

