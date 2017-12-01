<?php

namespace App\Console\Commands\Traits;

use App\User;

/**
 * Trait AsksForUsers.
 */
trait AsksForUsers
{
    /**
     * Ask for events.
     *
     * @return mixed
     */
    public function askForUsers()
    {
        $users = User::all();
        $user_names = $users->pluck('name')->toArray();
        $user_name = $this->choice('User?', $user_names);

        return $users->where('name', $user_name)->first()->id;
    }
}
