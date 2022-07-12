@extends('layouts.app');

@section('title', $developer->user->name);

@section('content')

<div>
    <p>{{$developer->curriculum}}</p>
</div>
{{-- <form action="{{ route('api.message.store') }}" method="POST" class="boot" enctype="multipart/form-data">
    <h3>inserisci un commento</h3>
    @csrf
    <div class="mb-3 row justify-content-center">
        <label for="name" class="col-sm-8 col-form-label">Name</label>
        <div class="col-sm-8">
            <input type="text" class="form-control @error('name') is-invalid @enderror" id="name" placeholder="Inserisci il tuo nome" name="name">
        </div>
        <div class="col-sm-8">
            <label for="mail" class="col-sm-4 col-form-label">mail: </label>
            <input type="text" class="form-control @error('mail') is-invalid @enderror" id="mail" name="mail">
        </div>
        <div class="col-sm-8">
            <label for="content" class="col-sm-4 col-form-label">content</label>
            <textarea name="content" type="text" cols="50" rows="10" class="form-control @error('content') is-invalid @enderror" id="content" placeholder="Inserisci il commento">
            </textarea>
        </div>
    </div>
    <button class="btn btn-warning"><strong>Save</strong></button>
</form> --}}

@endsection