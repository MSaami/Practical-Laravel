<?php

namespace App\Support\Discount\Coupon;

use App\Coupon;
use App\Support\Discount\Coupon\Validator\CanUseIt;
use App\Support\Discount\Coupon\Validator\IsExpired;

class CouponValidator
{
    public function isValid(Coupon $coupon)
    {
        $isExpired = resolve(IsExpired::class);
        $canUseIt = resolve(CanUseIt::class);

        $isExpired->setNextValidator($canUseIt);


        return $isExpired->validate($coupon);

    }
}
