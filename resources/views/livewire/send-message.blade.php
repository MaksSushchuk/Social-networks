<div>
    <form action="{{$messageRoute}}" method="POST" wire:submit.prevent="addComment">
        @csrf
        <div class="chat-input">
            <input type="text" name = "text" placeholder="Напишіть повідомлення">
            <button type ="submit">Надіслати</button>    
        </div>
    </form>     
</div>
