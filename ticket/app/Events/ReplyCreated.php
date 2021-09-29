<?php

namespace App\Events;

use App\Reply;
use Illuminate\Broadcasting\Channel;
use Illuminate\Queue\SerializesModels;
use Illuminate\Broadcasting\PrivateChannel;
use Illuminate\Broadcasting\PresenceChannel;
use Illuminate\Foundation\Events\Dispatchable;
use Illuminate\Broadcasting\InteractsWithSockets;
use Illuminate\Contracts\Broadcasting\ShouldBroadcast;

class ReplyCreated
{
    use Dispatchable, InteractsWithSockets, SerializesModels;
    public $reply;
    public $user;

    /**
     * Create a new event instance.
     *
     * @return void
     */
    public function __construct(Reply $reply, $user)
    {
        $this->reply = $reply;
        $this->user=  $user;
    }

}
