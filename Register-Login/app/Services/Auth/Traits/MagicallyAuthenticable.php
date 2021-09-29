<?php

namespace App\Services\Auth\Traits;

use App\LoginToken;

trait MagicallyAuthenticable
{
    public function magicToken()
    {
        return $this->hasOne(LoginToken::class);
    }


    public function createToken()
    {
        $this->magicToken()->delete();

        return $this->magicToken()->create([
            'token' => str_random(50)
        ]);
    }
}
