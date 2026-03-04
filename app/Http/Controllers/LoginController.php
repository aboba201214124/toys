<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class LoginController extends Controller
{
    public function loginPage()
    {
        return view('/auth/login');
    }
    public function login(Request $request)
    {
        $request->validate([
            'login' => "required|exists:users",
            'password' => "required",
        ], [
                'login.exists' => 'Такой логин не существует'
            ]
        );
        if (!Auth::attempt(['login' => $request->login, 'password' => $request->password])) {
            return redirect()->back()->withErrors([
                'auth' => 'Неверный логин или пароль'
            ]);
        }
        return redirect('/');
    }
}
