<?php

namespace App\Http\Livewire;

use Livewire\Component;
use App\Models\Comment;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class UserComment extends Component
{

    public string $text;
    public $commentRoute, $comments;


    public function mount($post_id)
    {
        $this->commentRoute = route('user.comment', $post_id);
    }

    public function render()
    {
        return view('livewire.user-comment');
    }
}
