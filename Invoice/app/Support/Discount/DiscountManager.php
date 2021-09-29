<?php

namespace App\Support\Discount;

use App\Support\Cost\BasketCost;

class DiscountManager
{
    /**
     * @var BasketCost
     */
    private $basketCost;

    /**
     * @var DiscountCalculator
     */
    private $discountCalculator;


    public function __construct(BasketCost $basketCost , DiscountCalculator $discountCalculator)
    {
        $this->basketCost = $basketCost;
        $this->discountCalculator = $discountCalculator;

    }

    public function calculateUserDiscount()
    {

        if (!session()->has('coupon')) return 0 ; 

        return $this->discountCalculator->discountAmount(session()->get('coupon') , $this->basketCost->getTotalCosts());


    }



}
