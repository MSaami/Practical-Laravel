<?php

namespace App\Observers;

use App\Topic;

class TopicObserver
{
    public function created(Topic $topic)
    {
        $topic->user->incrementXp(Topic::XP);
        $topic->user->incrementTopicCount();
    }

}
