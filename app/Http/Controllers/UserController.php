<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class UserController extends BaseController
{
    public function signUp()
    {
        return view('assests.sign-up');
    }

    public function signIn()
    {
        return view('assests.sign-in');
    }
}
