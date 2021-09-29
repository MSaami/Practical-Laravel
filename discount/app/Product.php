<?php

namespace App;

use App\Support\Discount\DiscountCalculator;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    public function hasStock(int $quantity)
    {
        return $this->stock >= $quantity;
    }


    public function decrementStock(int $count)
    {
        return $this->decrement('stock', $count);
    }


    public function category()
    {
        return $this->belongsTo(Category::class);
    }



    public function getPriceAttribute($price)
    {
        $coupons = $this->category->validCoupons();
        if ($coupons->isNotEmpty()){
            $discountCalculator = resolve(DiscountCalculator::class);
            return $discountCalculator->discountedPrice($coupons->first() ,$price);
        }

        return $price ;

    }




}
