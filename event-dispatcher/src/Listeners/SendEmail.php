<?php


namespace App\Listeners;

use App\Core\Event;
use App\Core\Listener;

class SendEmail extends Listener
{
    public function handle(Event $event)
    {
        echo "send email to " . $event->user->email;
    }
}
