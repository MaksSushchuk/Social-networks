@extends('layouts.main')

@section('content')
    <div class="container">
        @foreach ($notes as $note)
            <div class="notification">
                <div class="text" style="flex: 1; display: flex; align-items: center;">
                    {{ $note->username }} wants to add you as a friend
                </div>
                <form action="{{route('user.friend.accept',$note->user_send_id)}}" method="POST">
                    @csrf
                    <button class="btn btn-primary mt-2">Accept the request</button>
                </form>
            </div>
        @endforeach
    </div>
    
    <style>
        .container {
            max-width: 800px;
            margin: 0 auto;
            padding: 20px;
        }

        .notification {
            display: flex;
            justify-content: space-between;
            border: 1px solid #ccc;
            margin-bottom: 10px;
            padding: 20px;
            background-color: #f9f9f9;
            box-shadow: 0 2px 4px rgba(0, 0, 0, 0.1);
            border-radius: 5px;
        }

        .text {
            align-self: center;
        }
    </style>
@endsection
