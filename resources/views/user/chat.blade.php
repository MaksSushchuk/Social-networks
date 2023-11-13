@extends('layouts.main')
@section('content')
<link rel="stylesheet" href="{{asset('css/chat.css')}}">

    <div class="chat-container">
        <div class="chat-header">
            <h1>Чат з другом</h1>
        </div>
        <div class="chat-messages">
            @foreach($data as $message)
                @if($message->id == $myId)
                    <div class="message outgoing">
                        <p>{{$message->message_text}}</p>
                    </div>
                @endif

                @if($message->id == $user_accept)
                    <div class="message incoming">
                        <p>{{$message->message_text}}</p>                
                    </div>
                @endif
            @endforeach
         
        </div>
        @livewire('send-message', ['user_accept' => $user_accept])   
    </div>
@vite('resources/js/app.js')

<script></script>


<script type="module"> 
const chatMessages = document.querySelector('.chat-messages');
Echo.private(`store-message`)
    .listen('StoreMessageEvent', (e) => {
        const messageContainer = document.createElement('div');
        messageContainer.className = e.message_id == {{$myId}} ? 'message outgoing' : 'message incoming';
        messageContainer.innerHTML = `<p>${e.message.message}</p>`;

        chatMessages.appendChild(messageContainer);
    });
</script>
    @endsection 

