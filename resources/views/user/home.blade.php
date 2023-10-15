


@extends('layouts.main')
@section('content')

<div class="info">

    <div class="avatar">
        <img src="{{asset('storage/' . $avatar->path)}}" alt="">
    </div>
    <h4 class="name">{{$user->name}}</h4>

</div>
@foreach ($posts as $post)
    <div class="container">
        <div class="card" style="width: 32rem;">
            <img class="card-img-top" src="{{asset('storage/' . $avatar->path)}}" alt="Card image cap">
            <div class="card-body">
            <h5 class="card-title">{{$post->title}}</h5>
            <p class="card-text">{{$post->text}}</p>
            </div>
        </div>
    </div>
@endforeach




<style>
  .info {
        display:inline-block;
        margin-top: 150px;
        margin-left: 400px;
    }

    .avatar {
        width: 150px;
        height: 150px;
        border-radius: 50%;
        overflow: hidden;
    }

    .avatar img {
        width: 100%;
        height: 100%;
        object-fit: cover;
    }

    .name {
        margin-top: 10px;
        text-align: center;
    }

    .card{
        margin: 50px auto;
        text-align: center;
    }
</style>

@endsection
