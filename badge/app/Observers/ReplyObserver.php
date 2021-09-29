<?php

namespace App\Observers;

use App\Reply;

class ReplyObserver
{
    public function created(Reply $reply)
    {
        $reply->user->incrementXp(Reply::XP);
        $reply->user->incrementReplyCount();
    }

}
