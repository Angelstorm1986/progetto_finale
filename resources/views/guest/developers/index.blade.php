@extends('layouts.app')

@section('content')

<div class="container">
    <form action="{{route('guest.developers.index')}}" method="post">
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
    
    <div class="row">
        @foreach ($users as $user)
            @foreach($developers as $developer)
                <div class="card-container mx-3">
                    <span class="pro">PRO</span>
                    <div class="img-box">
                        <a class="text-decoration-none text-reset" href="{{route('guest.developers.show', $developer->id)}}">
                            <img class="round" src=" {{ asset('storage/' . $developer->photo) }} " alt="{{ $user->name }} {{ $user->surname }}">
                        </a>
                    </div>
                    <a class="text-decoration-none text-reset" href="{{route('guest.developers.show', $developer->id)}}">
                        <h3>{{ $user->name }} {{ $user->surname }}</h3>
                    </a>        
                    <h6>{{ $user->address }}</h6>
                    <span class="phone"><small>Tel.number: {{ $developer->phone_number }}</small></span>
    
                    <div class="buttons">
                        <button class="primary">
                            Message
                        </button>
                        <button class="primary ghost">
                            Reviews
                        </button>
                    </div>
                    <div class="skills">
                        <h6>Description:</h6>
                        <p>{{ $developer->description }}</p>
                        <h6>Skills:</h6>
                        <p><strong>{{ $developer->skills }}</strong></p>
                        <div class="language">
                            <h6>Languages:</h6>
                            <ul>
                                @foreach ($developer->languages as $language)
                                    <li>{{$language->name}}</li>
                                @endforeach
                            </ul>
                        </div>    
                    </div>
                </div>
            @endforeach
        @endforeach
    </div>
</div>

@endsection