<?php

namespace App\Providers;

use App\Support\Basket\Basket;
use App\Support\Cost\BasketCost;
use App\Support\Cost\Contracts\CostInterface;
use App\Support\Cost\DiscountCost;
use App\Support\Cost\ShippingCost;
use App\Support\Discount\DiscountManager;
use App\Support\Storage\Contracts\StorageInterface;
use App\Support\Storage\SessionStorage;
use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        //
    }

    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        $this->app->bind(StorageInterface::class, function ($app) {
            return new SessionStorage('cart');
        });


        $this->app->bind(CostInterface::class , function($app){
            $basketCost = new BasketCost($app->make(Basket::class));
            $shippinCost = new ShippingCost($basketCost);
            $discountCost = new DiscountCost($shippinCost , $app->make(DiscountManager::class));
            return $discountCost;
        });
    }
}
