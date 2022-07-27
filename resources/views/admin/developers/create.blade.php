@extends('layouts.app')
@section('content')
<?php
 if(null !== DB::table('developers')->where('user_id', Auth::user()->id)){
    redirect('admin.developer.edit');
 }
?>

<form action="{{ route('admin.developers.store') }}" method="POST" class="boot" enctype="multipart/form-data">
    @csrf
    <div class="mb-3 row justify-content-center">
        <label for="skills" class="col-sm-8 col-form-label">skills:</label>
        
        <div class="col-sm-8">
            <textarea type="text" class="form-control @error('skills') is-invalid @enderror" id="skills" placeholder="Inserisci le tue skill" name="skills">
                {{old('skills')}}
            </textarea>
        </div>

        <div class="col-sm-8">
            <div class="form-group">
                <img id="uploadPreviewCv" width="100" src="https://via.placeholder.com/300x200%22%3E" :class="existcurr == false ? 'opacity' : ''">
                <label for="curriculum">Aggiungi curriculum preferibilmente in formato .png</label>
                <input type="file" id="curriculum" name="curriculum" onchange="boolpress.previewCurriculum()" @change="renderer">
                @error('curriculum')
                    <div class="alert alert-danger">{{ $message }}</div>
                @enderror
            </div>
        </div>

        <div class="col-sm-8">
            <div class="form-group">
                <img id="uploadPreviewImage" width="100" src="https://via.placeholder.com/300x200%22%3E" :class="existphot == false ? 'opacity' : ''">
                <label for="photo">Aggiungi immagine</label>
                <input type="file" id="photo" name="photo" onchange="boolpress.previewImage();" @change="renderertwo">
                @error('photo')
                    <div class="alert alert-danger">{{ $message }}</div>
                @enderror
            </div>
        </div>


        <label for="phone_number" class="col-sm-8 col-form-label">numero di telefono:</label>
        <div class="col-sm-8">
            <input type="number" class="form-control @error('phone_number') is-invalid @enderror" id="phone_number" placeholder="Inserisci il numero di telefono" name="phone_number" maxlength="13">
        </div>
        <div class="col-sm-8">
            <label for="description" class="col-sm-4 col-form-label">descrizione:</label>
            <textarea name="description" type="text" cols="50" rows="10" class="form-control @error('description') is-invalid @enderror" id="description" placeholder="Inserisci la tua esperienza">
                {{old('description')}}
            </textarea>
        </div>
        <div class="col-sm-8">
            <label for="languages" class="col-sm-4 col-form-label" id="languages">linguaggi:</label>
            @foreach($languages as $language)
                <input type="checkbox" id="{{$language->name}}" name="languages[]" value="{{$language->id}}"> <label for="{{$language->name}}">{{$language->name}}</label>
            @endforeach
            <p>puoi avere anche un profilo developer vuoto, ma noi ti consigliamo di inserire almeno i linguaggi!</p>
        </div>
    </div>
    <div class="d-flex justify-content-center m-4">
        <button class="btn-warning"><strong>Save</strong></button>
    </div>
</form>
@endsection