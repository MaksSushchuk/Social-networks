@extends('layouts.main');
@section('content')

<div class="container mt-5">
    <table class="table">
        <thead>
        <tr>
            <th scope="col">ID</th>
            <th scope="col">Title</th>
            <th scope="col">Author</th>
            <th scope="col">Tags</th>
            <th scope="col">Actions</th>
        </tr>
        </thead>
        <tbody>
            @foreach ($posts as $post)
            <tr>
                <th scope="row">{{$post->id}}</th>
                <td>{{$post->title}}</td>
                <td>{{$post::getAuthor($post->author_id)->name}}</td>
            </tr>
            @endforeach
        </tbody>
    </table>
</div>




@endsection
