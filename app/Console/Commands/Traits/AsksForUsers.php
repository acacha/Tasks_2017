<?php

namespace App\Console\Commands\Traits;

use App\User;

/**
 * Trait AsksForUsers.
 *
 * @package Acacha\Events\Console\Commands
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
        dump($user_names);
        $user_name = $this->choice('User?',$user_names);
        dump($user_name);
        dump($users->where('name', $user_name)->first());
        return $users->where('name', $user_name)->first()->id;
    }
}