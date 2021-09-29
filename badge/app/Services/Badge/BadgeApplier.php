<?php

namespace App\Services\Badge;

use App\UserStat;

class BadgeApplier
{
    public function apply(UserStat $userStat)
    {
        $xpHandler = resolve(XpHandler::class);
        $topicHandler = resolve(TopicHandler::class);
        $replyHandler = resolve(ReplyHandler::class);

        $xpHandler->setNext($topicHandler)->setNext($replyHandler);

        $xpHandler->handle($userStat);
    }
}
