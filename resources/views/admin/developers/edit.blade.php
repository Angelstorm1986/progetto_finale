@extends('layouts.app')
@section('content')


<form action="{{ route('admin.developers.update', $developer->id) }}" method="POST" class="boot" enctype="multipart/form-data">
    @csrf
    @method('PUT')
    <div class="mb-3 row justify-content-center">
        <label for="skills" class="col-sm-8 col-form-label">skills</label>
        <div class="col-sm-8">
            <textarea type="text" class="form-control @error('skills') is-invalid @enderror" id="skills" name="skills">{{$developer->skills}}
            </textarea>
        </div>

        <div class="col-sm-8">
            <div class="form-group">
                @if ($developer->curriculum)
                    <img id="uploadPreview" width="100" src="{{asset("storage/{$developer->curriculum}")}}">
                @endif

                <label for="curriculum">Aggiungi curriculum .png</label>
                <input type="file" id="curriculum" name="curriculum" onchange="boolpress.previewCurriculum();">
                @error('curriculum')
                    <div class="alert alert-danger">{{ $message }}</div>
                @enderror
            </div>
        </div>

        <div class="col-sm-8">
            <div class="form-group">
                @if ($developer->photo)
                    <img id="uploadPreview" width="100" src="{{asset("storage/{$developer->photo}")}}">
                @endif

                <label for="photo">Aggiungi immagine</label>
                <input type="file" id="photo" name="photo" onchange="boolpress.previewImage();">
                @error('photo')
                    <div class="alert alert-danger">{{ $message }}</div>
                @enderror
            </div>
        </div>


        <label for="phone_number" class="col-sm-8 col-form-label">phone number</label>
        <div class="col-sm-8">
            <input type="number" maxlength="13" class="form-control @error('phone_number') is-invalid @enderror" id="phone_number" placeholder="Inserisci un titolo" name="phone_number" value="{{old('phone_number', $developer->phone_number)}}" v-model="number" placeholder="{{$developer->phone_number}}">
        </div>
        <div class="col-sm-8">
            <label for="description" class="col-sm-4 col-form-label">description</label>
            <textarea name="description" type="text" cols="50" rows="10" class="form-control @error('description') is-invalid @enderror" id="description">{{$developer->description}}
            </textarea>
        </div>
        <div class="col-sm-8">
            <label for="languages" class="col-sm-4 col-form-label" id="languages">linguaggi</label>
            @foreach($languages as $language)
                <input type="checkbox" id="{{$language->name}}" name="languages[]" value="{{$language->id}}"
                {{(is_array(old('checked')) && in_array($language->id, old('checked'))) ? 'checked' : ''}}
                {{-- @if(in_array($language->id, $checked))
                    checked
                @endif --}}
                > <label for="{{$language->name}}">{{$language->name}}</label>
            @endforeach
            <p>puoi avere anche un profilo developer vuoto, ma noi ti consigliamo di inserire almeno i linguaggi! Ora che stai modificando la pagina riseleziona i tuoi linguaggi</p>
        </div>
    </div>
    <button class="btn btn-warning"><strong>Save</strong></button>
</form>
<?php
    dd($checked);
?>
@endsection