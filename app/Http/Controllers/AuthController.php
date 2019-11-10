<?php

namespace App\Http\Controllers;

use App\Http\Requests\RegisterRequest;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Validator;

class AuthController extends Controller
{
    public function register()
    {
        return view('layouts.secondary', [
            'page' => 'pages.register',
            'title' => 'Регистрация',
            'content' => '',
            'activeMenu' => 'register',
        ]);
    }

    public function registerPost(RegisterRequest $request)
    {
        User::create([
            'name' => $request->input('name'),
            'email' => $request->input('email'),
            'password' => bcrypt($request->input('password')),
            'phone' => $request->input('phone'),
        ]);

        return redirect()->route('site.main.index');
    }

    public function login()
    {
        return view('layouts.secondary', [
            'page' => 'pages.login',
            'title' => 'Вход в систему',
            'content' => '',
            'activeMenu' => 'feedback',
        ]);
    }

    public function loginPost(Request $request)
    {
        $credentials = $request->only('email', 'password');

        if (Auth::attempt($credentials, true)) {
            return redirect()->route('site.main.index');
        }
    }

    public function logout()
    {
        Auth::logout();

        return redirect()->route('site.main.index');
    }
}
