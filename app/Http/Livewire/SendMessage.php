<?php

namespace App\Http\Livewire;

use Livewire\Component;
use PhpParser\Node\Expr\FuncCall;
use Illuminate\Support\Facades\Route;

class SendMessage extends Component
{
    public string $text;
    public $messageRoute;
    public int $user_accept;

    public function mount(int $user_accept){
        $this->messageRoute = route('user.chat.message', $user_accept);
    }
    public function render()
    {
        return view('livewire.send-message');
    }
}
