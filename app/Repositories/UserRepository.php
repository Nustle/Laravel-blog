<?php

namespace App\Repositories;

use App\Models\User;

class UserRepository
{
    /**
     * Registeres new user.
     *
     * @param RegisterRequest $request
     * @return mixed
     */
    public function registerUser($request)
    {
        return User::create([
            'name' => $request->input('name'),
            'email' => $request->input('email'),
            'password' => bcrypt($request->input('password')),
            'phone' => $request->input('phone'),
        ]);
    }
}
