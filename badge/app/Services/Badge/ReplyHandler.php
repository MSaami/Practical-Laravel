<?php

namespace App\Services\Badge;

use App\Badge;
use App\UserStat;

class ReplyHandler extends AbstractHandler
{
    public function handle(UserStat $userStat)
    {
        if ($userStat->isDirty('reply_count')) return $this->applyBadge($userStat);


        return parent::handle($userStat);
    }


    protected function getAvailableBadges($userStat)
    {
        return Badge::reply()->where('required_number', '<=', $userStat->reply_count)->get();

    }
}
