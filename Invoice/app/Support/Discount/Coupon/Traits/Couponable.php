<?php

namespace App\Support\Discount\Coupon\Traits;

use App\Coupon;
use Carbon\Carbon;

trait Couponable
{
    public function coupons()
    {
        return $this->morphMany(Coupon::class , 'couponable');
    }


    public function validCoupons()
    {
        return $this->coupons->where('expire_time' , '>' , Carbon::now());
    }
}
