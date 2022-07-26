@extends('layouts.app')

@section('content')
@if($messages->isNotEmpty())
    <div class="container">
        @foreach($messages as $comment)
        <hr>
        <div class="comment-show skills" v-for="(comment, index) in comments">
            <div class="mail-comm">
                <p class="nomi h-4">{{$comment->name}}</p>
                <p class="mail">{{$comment->name}}</p>
            </div>
            <p class="commento ">{{$comment->content}}</p>
        </div>
        @endforeach
        <h1>porcoddio</h1>
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