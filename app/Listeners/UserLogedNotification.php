<?php

namespace App\Listeners;

use App\Events\LogedUser;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Support\Facades\Log;

/**
 * Class UserLogsedNotification
 * @package App\Listeners
 */
class UserLogedNotification
{
    /**
     * Create the event listener.
     *
     * @return void
     */
    public function __construct()
    {
        //
    }

    /**
     * Handle the event.
     *
     * @param  object  $event
     * @return void
     */
    public function handle(LogedUser $event)
    {
        Log::info('TODO send notification');
        Notification::send(null, new LogedUserNotification($event->user));

    }
}
