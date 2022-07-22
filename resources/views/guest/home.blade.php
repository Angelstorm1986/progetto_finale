@extends('layouts.app')

@section('title', 'BDevelopers - Home')

@section('content')
        <div class="flex-center position-ref full-height">
            <div id="root">
                <h1><a href="{{ route('guest.developers.index') }}">link</a></h1>
            </div>
        </div>
@endsection