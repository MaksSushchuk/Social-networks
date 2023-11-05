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
                <img class="card-img-top" src="{{asset('storage/' . $post->file)}}" alt="Card image cap">
                <div class="card-body">
                    <h5 class="card-title">{{$post->title}}</h5>
                    <p class="card-text">{{$post->text}}</p>
                </div>
                <div class="user-actions">
                    <div class="rating">
                      
                        <button type="submit" class="btn btn-like"  data-post-id="{{$post->id}}"><i class="fa fa-thumbs-up fa-lg btn-like {{UserReaction::existRaiting($user->id,$post->id,'like') ? 'green' : '' }}" " aria-hidden="true"></i></button>
                        <button type="submit" class="btn btn-dislike"  data-post-id="{{$post->id}}"><i class="fa fa-thumbs-down fa-lg btn-dislike {{UserReaction::existRaiting($user->id,$post->id,'dislike') ? 'red' : '' }}" " aria-hidden="true"></i></button>
                    </div>
                    <div class="show-comments">
                        <button class="show-comments-button" type="button">Показати коментарі</button>
                    </div>
                </div>
                <div class="comments" wire:key="comments-list" wire:poll.1000ms>
                    @foreach ($post->comments as $comment)
                        <div class="user-info">
                            <img src="{{ asset('storage/' . $avatarPath) }}" alt="">
                            <span class="username">{{ $user->username }}</span>
                        </div>    
                        <div class="comment-text">{{$comment->text}}</div>
                    @endforeach
                </div>                <div class="user-comment" data-post-id="{{$post->id}}">
                    <div class="user-info">
                        <img src="{{ asset('storage/' . $avatarPath) }}" alt="">
                        <span class="username">{{ $user->username }}</span>
                    </div>
                    @livewire('user-comment', ['post_id' => $post->id])
                </div>
            </div>
        </div>
    @endforeach
</div>

<script>
    Livewire.on('commentAdded', function () {
        // Викликаємо метод оновлення коментарів
        Livewire.emit('updateComments');
    });
</script>

<script src="{{asset('js/like-dislike.js')}}"></script>
<script src="{{asset('js/show-comment.js')}}"></script>
<script src="{{asset('js/add-comment.js')}}"></script>

<script src="https://use.fontawesome.com/fe459689b4.js"></script>
@endsection
