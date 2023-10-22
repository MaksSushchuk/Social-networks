<?php
use App\Models\UserReaction;
?>
@extends('layouts.main')
@section('content')

<link rel="stylesheet" href="{{asset('css/home.css')}}">

<div class="info">

    <div class="avatar">
        <img src="{{asset('storage/' . $avatarPath)}}" alt="">
    </div>
    <h4 class="name">{{$user->username}}</h4>

</div>
<div class="posts">
    @foreach ($posts as $post)
        <div class="container">
            <div class="card" style="width: 32rem;">
                <img class="card-img-top" src="{{asset('storage/' . $avatarPath)}}" alt="Card image cap">
                <div class="card-body">
                    <h5 class="card-title">{{$post->title}}</h5>
                    <p class="card-text">{{$post->text}}</p>
                </div>
                <div class="rating">
                    <form action="{{route('user.like',$post->id)}}" method="POST">
                        @csrf
                        <button type="submit" class="btn"><i class="fa fa-thumbs-up fa-lg btn-like {{UserReaction::existRaiting($user->id,$post->id,'like') ? 'green' : '' }}" data-post-id="{{$post->id}}" aria-hidden="true"></i></button>
                    </form>
                    <form action="{{route('user.dislike',$post->id)}}" method="POST">
                        @csrf
                        <button type="submit" class="btn"><i class="fa fa-thumbs-down fa-lg btn-dislike {{UserReaction::existRaiting($user->id,$post->id,'dislike') ? 'red' : '' }}" data-post-id="{{$post->id}}" aria-hidden="true"></i></button>
                    </form>
                </div>
            </div>
        </div>
    @endforeach
</div>


<script src="{{asset('js/like-dislike.js')}}"></script>
<script src="https://use.fontawesome.com/fe459689b4.js"></script>
@endsection
