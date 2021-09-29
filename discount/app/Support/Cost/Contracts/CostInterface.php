<?php

namespace App\Support\Cost\Contracts;

interface CostInterface
{
    public function getCost();
    public function getTotalCosts();
    public function persianDescription();
    public function getSummary();
}
