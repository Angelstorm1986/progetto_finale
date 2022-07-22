@extends('layouts.app')

@section('content')

<div class="container">
    <form action="{{route('admin.developers.index')}}" method="post">
        <div class="form-group">
            <label for="language" class="form-label">Search developers from languages:</label>
            <select name="language_id" id="language" class="form-control" v-model="selectedLanguage">
                <option value="">Select Language</option>
                @foreach ($languages as $language)
                    <option value="{{$language->id}}">{{$language->name}}</option>
                @endforeach
            </select>
        </div>
    </form>
    <br>
    <div class="create">
        <h4>Create your developer profile:</h4>
        <button class="m-3 btn btn-warning">
            <a class="text-decoration-none text-light" href="{{route('admin.developers.create')}}">Click here</a>
        </button>
    </div>
    <div class="row">
        @foreach ($users as $user)
            @foreach($developers as $developer)
                @if ($developer->user_id == $user->id)
                    <div class="col-sm-12 col-md-6 col-xl-4">
                        <img class="rounded-pill" src=" {{ asset('storage/' . $developer->photo) }} " alt="{{ $user->name }} {{ $user->surname }}">
                        <h1>{{ $user->name }} {{ $user->surname }}</h1>
                        <img src=" {{ asset('storage/' . $developer->curriculum) }} " alt="Curriculum Vitae">
                        <p>{{ $developer->description }}</p>
                        <p>{{ $developer->skills }}</p>
                        <ul>
                            @foreach ($developer->languages as $language)
                                <li>{{$language->name}}</li>
                            @endforeach
                        </ul>
                        <span>{{ $developer->phone_number }}</span>
                        <a href="{{route('admin.developers.show', $developer->id)}}">Visualizza il profilo dello sviluppatore</a>
                    </div>
                @endif 
            @endforeach
        @endforeach
    </div>
</div>

@endsection