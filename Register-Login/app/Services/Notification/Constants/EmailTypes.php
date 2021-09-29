<?php
namespace App\Services\Notification\Constants;

use App\Mail\UserRegistered;
use App\Mail\TopicCreated;
use App\Mail\ForgetPassword;

class EmailTypes
{
    const USER_REGISTERED = 1;
    const TOPIC_CREATED = 2;

    public static function toString()
    {
        return [
            self::USER_REGISTERED => 'ثبت نام کاربر',
            self::TOPIC_CREATED => 'ایجاد مقاله جدید ',
        ];
    }



    public static function toMail($type)
    {
        try {
            return [
                self::USER_REGISTERED => UserRegistered::class,
                self::TOPIC_CREATED => TopicCreated::class,
            ][$type];
        } catch (\Throwable $th) {
            throw new \InvalidArgumentException('Mailable class does not exist');
        }
    }
}
