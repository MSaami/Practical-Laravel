<?php

/* @var $factory \Illuminate\Database\Eloquent\Factory */

use App\Product;
use Faker\Generator as Faker;

$factory->define(Product::class, function (Faker $faker) {
    return [
	    'title' => $faker->randomElement([
		    'موبایل سامسونگ',
		    'لپ تاپ سونی',
		    'لپ تاپ فوجیتسو',
		    'مچبند شیائومی',
		    'اسپیکر هارمن کاردن',
		    'مودم ADSL',
		    'پاور بانک',
		    'دوربین',
		    'کابل صدا',
		    'باتری موبایل',
		    'کتابخوان',
		    'ال جی مانیتور',
		    'تبلت سامسونگ',
	    ]),
	    'description' => 'لورم ایپسوم متن ساختگی با تولید سادگی نامفهوم از صنعت چاپ و با استفاده از طراحان گرافیک است چاپگرها و متون بلکه .',

	    'image' => 'https://via.placeholder.com/286x180?text=Image',
	    'price' => $faker->randomElement([
		150000 , 450000 , 252000 , 2521000 , 250000 , 150000 , 850000 , 650000, 450000 , 950000 , 410000 , 320000
	    ]),
	    'stock'=> $faker->randomDigitNotNull
    ];
});
