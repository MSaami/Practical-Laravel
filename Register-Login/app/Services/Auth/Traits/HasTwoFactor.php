<?php

namespace App\Services\Auth\Traits;

use App\TwoFactor;

trait HasTwoFactor
{
    public function code()
    {
        return $this->hasOne(TwoFactor::class);
    }

    public function activateTwoFactor()
    {
        $this->has_two_factor = true;
        $this->save();
    }
    public function deactivateTwoFactor()
    {
        $this->has_two_factor = false;
        $this->save();
    }


    public function hasTwoFactor()
    {
        return $this->has_two_factor;
    }
}
