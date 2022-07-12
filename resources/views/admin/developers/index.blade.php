@extends('layouts.app')

@section('content')

<div class="continer">
    <div class="row">
        <?php foreach($developer as $developer){  ?>
        <div class="col-12">
            <a href="{{route('admin.developer.show', $developer)}}"><h1>{{$developer->name}}</h1></a>
            <p>{{$developer->name}}</p>

        </div>
        <?php } ?>
    </div>
</div>

@endsection