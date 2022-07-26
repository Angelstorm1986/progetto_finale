@extends('layouts.app')

@section('content')
@if(!empty($reviews))
    <div class="container">
        @foreach($reviews as $review)
        <hr>
        <div class="comment-show skills">
            <div class="mail-comm">
                <p class="nomi h-4">{{$review->name}}</p>
                <p class="mail">
                    @for ($i = 0; $i < $review->rate; $i++)
                    <i class="fa-solid fa-certificate yellow"></i>
                    @endfor
                    @for ($i = 0; $i < 5 - $review->rate; $i++)
                    <i class="fa-solid fa-certificate grey"></i>
                    @endfor
                </p>
            </div>
            <p class="commento ">{{$review->content}}</p>
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
                <h1>{{Auth::user()->name}}, ci dispiace. <br> Non hai ricevuto nessuna recensione</h1>
            </div>
        </div>
    </div>
@endif
<?php
?>

@endsection