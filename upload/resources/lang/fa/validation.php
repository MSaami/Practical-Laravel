<?php


return [
    'integer' => ':attribute باید به صورت عددی باشد.',
    'exists' => ':attribute داخل سیستم وجود ندارد.',
    'string' => ':attribute باید به صورت صحیح وارد شود.',
    'required' => ':attribute الزامی میباشد.',
    'required_if' => ' :attribute الزامی میباشد. ',
    'email' => ':attribute باید به صورت ایمیل باشد.',
    'unique' => ':attribute تکراری میباشد.',
    'confirmed' => ':attribute مطابقت ندارد.',
    'max' => [
        'string' => ':attribute حداکثر باید :max کاراکتر باشد.',
        'integer' => ':attribute باید حداکثر :max عدد باشد.'
    ],
    'min' => [
        'string' => ':attribute باید حداقل :min کاراکتر باشد.'
    ],
    'digits' => ':attribute باید :digits رقم باشد.',
    'numeric' => ':attribute باید به صورت عددی باشد.',


    'attributes' => [
        'email_type' => 'نوع ایمیل',
        'user' => 'کاربر',
        'text' => 'متن پیام کوتاه',
        'name' => 'نام',
        'email' => 'ایمیل',
        'phone_number' => 'شماره تلفن',
        'password_confirmation' => 'تایید کلمه عبور',
        'password' => 'کلمه عبور',
        'token' => 'توکن',
        'code' => 'کد',
	'persian_name' => 'نام فارسی',
	'method' => 'روش پرداخت',
	'gateway' => 'درگاه پرداخت'

    ]
];
