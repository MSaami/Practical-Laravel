<?php

namespace App\Support\Discount\Coupon\Validator\Contracts;

use App\Coupon;

abstract class AbstractCouponValidator implements CouponValidatorInterface
{
    private $nextValidator ;
    public function setNextValidator(CouponValidatorInterface $validator)
    {
        $this->nextValidator = $validator ;
    }


    public function validate(Coupon $coupon)
    {
        if ($this->nextValidator === null ) {
            return true;
        }

        return $this->nextValidator->validate($coupon);

    }

}
