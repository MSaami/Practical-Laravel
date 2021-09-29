<?php

namespace App\Support\Discount\Coupon\Validator;

use App\Coupon;
use App\Exceptions\IllegalCouponException;
use App\Support\Discount\Coupon\Validator\Contracts\AbstractCouponValidator;

class CanUseIt extends AbstractCouponValidator
{
    public function validate(Coupon $coupon)
    {
        if(!auth()->user()->coupons->contains($coupon)){
            throw new IllegalCouponException();
        }

        return parent::validate($coupon);

    }
}
