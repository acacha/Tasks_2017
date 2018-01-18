<?php

namespace App\Providers;

use App\Events\LogedUser;
use App\Listeners\AssignDefaultPermission;
use App\Listeners\UserLogedNotification;
use Illuminate\Foundation\Support\Providers\EventServiceProvider as ServiceProvider;

class EventServiceProvider extends ServiceProvider
{
    /**
     * The event listener mappings for the application.
     *
     * @var array
     */
    protected $listen = [
        LogedUser::class => [
            AssignDefaultPermission::class,
            UserLogedNotification::class
        ],
    ];

    /**
     * Register any events for your application.
     *
     * @return void
     */
    public function boot()
    {
        parent::boot();

        //
    }
}
