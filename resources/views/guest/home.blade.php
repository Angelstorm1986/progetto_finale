@extends('layouts.app')

@section('title', 'BDevelopers - Home')

@section('content')
    <body>
        <div class="flex-center position-ref full-height">
            <div id="root">
                <h1><a href="{{ route('admin.developers.index') }}">link</a></h1>
            </div>
        </div>
    </body>
</html>
@endsection