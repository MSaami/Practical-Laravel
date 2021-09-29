<?php

namespace App\Observers;

use App\Services\Badge\BadgeApplier;
use App\UserStat;

class UserStatObserver
{
    public function updated(UserStat $userStat)
    {
        resolve(BadgeApplier::class)->apply($userStat);

    }

}
