<?php

namespace App\Services\Badge;

use App\Badge;
use App\UserStat;

class XpHandler extends AbstractHandler
{
    public function handle(UserStat $userStat)
    {
        if ($userStat->isDirty('xp')) $this->applyBadge($userStat);

        return parent::handle($userStat);
    }


    protected function getAvailableBadges($userStat)
    {
        return Badge::xp()->where('required_number', '<=', $userStat->xp)->get();
    }

}
