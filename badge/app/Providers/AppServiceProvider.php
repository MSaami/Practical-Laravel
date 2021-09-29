<?php

namespace App\Providers;

use App\Observers\ReplyObserver;
use App\Observers\TopicObserver;
use App\Observers\UserObserver;
use App\Observers\UserStatObserver;
use App\Reply;
use App\Topic;
use App\User;
use App\UserStat;
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
        User::Observe(UserObserver::class);
        Topic::Observe(TopicObserver::class);
        Reply::Observe(ReplyObserver::class);
        UserStat::Observe(UserStatObserver::class);
    }
}
