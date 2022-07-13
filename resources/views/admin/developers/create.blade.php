@extends('layouts.app')
@section('content')

<form action="{{ route('admin.developers.store') }}" method="POST" class="boot" enctype="multipart/form-data">
    @csrf
    <div class="mb-3 row justify-content-center">
        <label for="skills" class="col-sm-8 col-form-label">skills</label>
        <div class="col-sm-8">
            <textarea type="text" class="form-control @error('skills') is-invalid @enderror" id="skills" placeholder="Inserisci le tue skill" name="skills">
            </textarea>
        </div>

        <div class="col-sm-8">
            <div class="form-group">
                <img id="uploadPreview" width="100" src="https://via.placeholder.com/300x200%22%3E">
                <label for="curriculum">Aggiungi curriculum .png</label>
                <input type="file" id="curriculum" name="curriculum" onchange="boolpress.previewImage();">
                @error('curriculum')
                    <div class="alert alert-danger">{{ $message }}</div>
                @enderror
            </div>
        </div>

        <div class="col-sm-8">
            <div class="form-group">
                <img id="uploadPreview" width="100" src="https://via.placeholder.com/300x200%22%3E">
                <label for="image">Aggiungi immagine</label>
                <input type="file" id="image" name="image" onchange="boolpress.previewImage();">
                @error('image')
                    <div class="alert alert-danger">{{ $message }}</div>
                @enderror
            </div>
        </div>


        <label for="phone_number" class="col-sm-8 col-form-label">phone number</label>
        <div class="col-sm-8">
            <input type="text" class="form-control @error('phone_number') is-invalid @enderror" id="phone_number" placeholder="Inserisci un titolo" name="phone_number">
        </div>
        <div class="col-sm-8">
            <label for="description" class="col-sm-4 col-form-label">description</label>
            <textarea name="description" type="text" cols="50" rows="10" class="form-control @error('description') is-invalid @enderror" id="description" placeholder="Inserisci la tua esperienza">
            </textarea>
        </div>
    </div>
    <button class="btn btn-warning"><strong>Save</strong></button>
</form>
@endsection