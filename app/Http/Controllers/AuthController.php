<?php

namespace App\Http\Controllers;

use App\Http\Requests\RegisterRequest;
use App\Repositories\UserRepository;
use Illuminate\Http\Request;
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

    public function registerPost(RegisterRequest $request, UserRepository $repository)
    {
        $repository->registerUser($request);

        return redirect()->route('site.main.index');
    }

    public function login()
    {
        return view('layouts.secondary', [
            'page' => 'pages.login',
            'title' => 'Вход в систему',
            'activeMenu' => 'login',
        ]);
    }

    public function loginPost(Request $request)
    {
        $credentials = $request->only('email', 'password');
        $remember = $request->input('remember') ? true : false;

        if (Auth::attempt($credentials, $remember)) {
            return redirect()->route('site.main.index');
        } else {
            return redirect()->route('site.auth.login')->with('authError', 'custom.auth_error');
        }
    }

    public function logout()
    {
        Auth::logout();

        return redirect()->route('site.main.index');
    }
}
