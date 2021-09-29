<?php

namespace App\Services\Badge;

use App\UserStat;

interface Handler
{
    public function setNext(Handler $handler);
    public function handle(UserStat $userStat);
}
