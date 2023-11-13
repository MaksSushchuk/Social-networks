<?php

namespace App\Events;

use App\Http\Resources\MessageResource;
use App\Models\Message;
use App\Models\User;
use Illuminate\Broadcasting\Channel;
use Illuminate\Broadcasting\InteractsWithSockets;
use Illuminate\Broadcasting\PresenceChannel;
use Illuminate\Broadcasting\PrivateChannel;
use Illuminate\Contracts\Broadcasting\ShouldBroadcast;
use Illuminate\Foundation\Events\Dispatchable;
use Illuminate\Queue\SerializesModels;

class StoreMessageEvent implements ShouldBroadcast
{
    use Dispatchable, InteractsWithSockets, SerializesModels;
    public Message $message;
    public User $user;
    /**
     * Create a new event instance.
     *
     * @return void
     */

     /**
     * The name of the queue on which to place the broadcasting job.
     *
     * @var string
     */

    public function __construct(Message $message, User $user)
    {
        $this->message = $message;
        $this->user = $user;
    }

    /**
     * Get the channels the event should broadcast on.
     *
     * @return \Illuminate\Broadcasting\Channel|array
     */
    public function broadcastOn()
    {
        return new PrivateChannel('store-message');
    }

    /**
     * The event's broadcast name.
     */
    // public function broadcastAs(): string
    // {
    //     return 'store-message';
    // }

    /**
     * Get the data to broadcast.
     *
     * @return array<string, mixed>
     */
    // public function broadcastWith(): array
    // {
    //     return ['message' => MessageResource::make($this->message)->resolve()];

    // }
}
