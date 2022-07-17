@extends('layouts.app')

@section('content')

<div class="container">
    <div class="row">
        <div class="container-fluid d-flex justify-content-end">
            <form class="d-flex" role="search">
              <input class="form-control me-2" type="search" placeholder="Search" aria-label="Search">
              <button class="btn btn-outline-success" type="submit">Search</button>
            </form>
        </div>
        @foreach ($users as $user)
            @foreach($developers as $developer)
                @if ($developer->user_id == $user->id)
                    <div class="col-12">
                        <a href="{{route('admin.developers.show', $developer->id)}}"><h1>
                        {{$user->name}}</h1></a>
                        <p>{{$user->surname}}</p>
                    </div>   
                @endif
            @endforeach
        @endforeach
    </div>
</div>

@endsection