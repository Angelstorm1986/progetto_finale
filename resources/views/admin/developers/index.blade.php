@extends('layouts.app')

@section('content')

<div class="container">
    <div class="row">
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