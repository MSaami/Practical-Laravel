<?php

namespace App\Support\Cost;

use App\Support\Cost\Contracts\CostInterface;

class ShippingCost implements CostInterface
{
    /**
     * @var CostInterface
     */
    private $cost;
    const SHIPPING_COST = 20000 ;

    public function __construct(CostInterface $cost)
    {
        $this->cost = $cost;
    }


    public function getCost()
    {
        return self::SHIPPING_COST ;
    }

    public function getTotalCosts()
    {
        return $this->cost->getTotalCosts() + $this->getCost();
    }

    public function persianDescription()
    {
        return 'هزینه حمل و نقل';
    }

    public function getSummary()
    {
        return array_merge($this->cost->getSummary(), [$this->persianDescription() => $this->getCost()]);
    }
}
