<?php

namespace App\Providers;

use Illuminate\Foundation\Support\Providers\EventServiceProvider as ServiceProvider;
use App\Infrastructure\EventHandling\SaveUserListener;
use App\Infrastructure\Messaging\Events\SaveUser;

class EventServiceProvider extends ServiceProvider
{
    protected $listen = [
        SaveUser::class  => [
            SaveUserListener::class,
        ],
    ];

    public function boot()
    {
        parent::boot();

         
    }
}
