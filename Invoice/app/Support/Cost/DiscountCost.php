<?php

namespace App\Support\Cost;

use App\Support\Cost\Contracts\CostInterface;
use App\Support\Discount\DiscountManager;

class DiscountCost implements CostInterface
{
    /**
     * @var CostInterface
     */
    private $cost;

    /**
     * @var DiscountManager
     */
    private $discountManager;


    public function __construct(CostInterface $cost, DiscountManager $discountManager)
    {
        $this->cost = $cost;
        $this->discountManager = $discountManager;
    }


    public function getCost()
    {
        return $this->discountManager->calculateUserDiscount();
    }

    public function getTotalCosts()
    {
        return $this->cost->getTotalCosts() - $this->getCost();
    }

    public function persianDescription()
    {
        return 'میزان تخفیف';
    }

    public function getSummary()
    {
        return array_merge($this->cost->getSummary(), [$this->persianDescription() => $this->getCost()]);
    }
}
