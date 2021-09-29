<?php

namespace App\Support\Discount\Coupon\Validator\Contracts;

use App\Coupon;

interface CouponValidatorInterface
{
    public function setNextValidator(CouponValidatorInterface $validator);
    public function validate(Coupon $coupon);
}
