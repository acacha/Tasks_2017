<?php

namespace App\Http\Controllers;

use App\User;
use Illuminate\Http\Request;

/**
 * Class ApiUserController
 * @package App\Http\Controllers
 */
class ApiUserController extends Controller
{
    /**
     * Show all users.
     *
     * @return \Illuminate\Database\Eloquent\Collection|static[]
     */
    public function index()
    {
        return User::all();
    }

    /**
     * Show a user.
     * @param User $user
     * @return User
     */
    public function show(User $user)
    {
        return $user;
    }

    /**
     * Store user.
     *
     * @param Request $request
     * @return mixed
     */
    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required'
        ]);

        $user = User::create([
            'name' => $request->name
        ]);

        return $user;
    }

    /**
     * Delete user.
     *
     * @param Request $request
     * @param User $user
     * @return User
     */
    public function destroy(Request $request, User $user)
    {
        $user->delete();

        return $user;
    }

    /**
     * Update user.
     *
     * @param Request $request
     * @param User $user
     * @return User
     */
    public function update(Request $request, User $user)
    {
        $request->validate([
            'name' => 'required'
        ]);

        $user->name = $request->name;
        $user->save();

        return $user;
    }

}
