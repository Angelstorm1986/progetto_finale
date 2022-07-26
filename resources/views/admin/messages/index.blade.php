@extends('layouts.app')

@section('content')
@if(!empty($messages))
    <div class="container">
        @foreach($messages as $comment)
        <hr>
        <div class="comment-show skills">
            <div class="mail-comm">
                <p class="nomi h-4">{{$comment->name}}</p>
                <p class="mail">{{$comment->mail}}</p>
            </div>
            <p class="commento ">{{$comment->content}}</p>
        </div>
        @endforeach
    </div>
@else
    <div class="container">
        <div class="empty index">
            <div class="face">
                <p>:(</p>
            </div>
            <div class="warn">
                <h1>{{Auth::user()->name}}, ci dispiace. <br> Non ci sono messaggi per te</h1>
            </div>
        </div>
    </div>
@endif
<?php
?>

@endsection