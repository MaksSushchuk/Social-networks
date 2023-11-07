<div>
    <form id="comment-form" action="{{ $commentRoute }}" method="POST" wire:submit.prevent="addComment">
        @csrf                        
        <div class="comment-text">
            <textarea name="text" id="comment-text" placeholder="Ваш коментар" rows="3" required></textarea>
        </div>
        <button type="submit" class="btn btn-primary" id="add-comment-btn">Додати коментар</button>
    </form>
</div>
