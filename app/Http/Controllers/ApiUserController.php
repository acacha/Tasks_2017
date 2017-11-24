<?php

namespace App\Http\Controllers;

use App\User;
use Illuminate\Http\Request;

/**
 * Class ApiUserController.
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
     *
     * @param User $user
     *
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
     *
     * @return mixed
     */
    public function store(Request $request)
    {
        $request->validate([
            'name'     => 'required|max:255',
            'username' => 'sometimes|required|max:255|unique:users',
            'email'    => 'required|email|max:255|unique:users',
            'password' => 'required|min:6',
        ]);

        $user = User::create([
            'name'     => $request->name,
            'username' => $request->username,
            'email'    => $request->email,
            'password' => bcrypt($request->password),
        ]);

        return $user;
    }

    /**
     * Delete user.
     *
     * @param Request $request
     * @param User    $user
     *
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
     * @param User    $user
     *
     * @return User
     */
    public function update(Request $request, User $user)
    {
        $request->validate([
            'name' => 'required',
        ]);

        $user->name = $request->name;
        $user->save();

        return $user;
    }
}
