@extends('layouts.app')

@section('title', 'BDevelopers - Home')

@section('content')
    <body>
        <div class="flex-center position-ref full-height">
            @if (Route::has('login'))
                <div class="top-right links">
                    @auth
                        <a href="{{ url('/home') }}">Home</a>
                    @else
                        <a href="{{ route('login') }}">Login</a>

                        @if (Route::has('register'))
                            <a href="{{ route('register') }}">Register</a>
                        @endif
                    @endauth
                </div>
            @endif


            <div id="root">
                <h1><a href="{{ route('admin.developers.index') }}">link</a></h1>
            </div>
        </div>
    </body>
</html>
@endsection