<?php

namespace App\Listeners;

use App\Events\LogedUser;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Support\Facades\Log;

/**
 * Class AssignDefaultPermission.
 *
 * @package App\Listeners
 */
class AssignDefaultPermission implements ShouldQueue
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
     * @param  LogedUser  $event
     * @return void
     */
    public function handle(LogedUser $event)
    {
        $event->user->assignRole('task-manager');
    }
}
