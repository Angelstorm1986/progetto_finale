@extends('layouts.app')

@section('content')

<div class="container">
    <div class="row">
        <div class="container-fluid d-flex justify-content-end">
            <form class="d-flex" role="search">
              <input class="form-control me-2" type="search" placeholder="Search" aria-label="Search">
              <button class="search" type="submit">Search</button>
            </form>
        </div>
        @foreach ($users as $user)
            @foreach($developers as $developer)
                @if ($developer->user_id == $user->id)
                    <div class="col-sm-12 col-md-6 col-xl-4">
                        <img class="rounded-pill" src=" {{ asset('storage/' . $developer->photo) }} " alt="{{ $user->name }} {{ $user->surname }}">
                        <h1>{{ $user->name }} {{ $user->surname }}</h1>
                        <img src=" {{ asset('storage/' . $developer->curriculum) }} " alt="Curriculum Vitae">
                        <p>{{ $developer->description }}</p>
                        <p>{{ $developer->skills }}</p>
                        <span>{{ $developer->phone_number }}</span>
                        <a href="{{route('admin.developers.show', $developer->id)}}">Visualizza il profilo dello sviluppatore</a>
                    </div>
                @endif 
            @endforeach
        @endforeach
    </div>
</div>

@endsection