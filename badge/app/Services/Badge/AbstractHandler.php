<?php

namespace App\Services\Badge;

use App\UserStat;

abstract class AbstractHandler implements Handler
{

    private $nextHandler;


    public function setNext(Handler $handler)
    {
        $this->nextHandler = $handler;

        return $handler;
    }


    public function handle(UserStat $userStat)
    {
        if ($this->nextHandler){
            return $this->nextHandler->handle($userStat);
        }

        return null;

    }

    protected function applyBadge($userStat)
    {
        $availabelBadges = $this->getAvailableBadges($userStat);

        $userBadges = $userStat->user->badges;

        $notRecievedBadge = $availabelBadges->diff($userBadges);

        if ($notRecievedBadge->isEmpty()) return ;

        $userStat->user->badges()->attach($notRecievedBadge);

    }

    abstract protected function getAvailableBadges($userStat);
}
