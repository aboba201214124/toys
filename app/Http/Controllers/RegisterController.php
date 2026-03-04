<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class RegisterController extends Controller
{
    public function registerPage()
    {
        return view('/auth/register');
    }

    public function register(Request $r)
    {
        $r->validate([
            'login' => "unique:users,login|min:3|max:15|required",
            'password' => "min:3|max:100|required|confirmed",
        ], [
            'password.confirmed' => "Пароли не совпадают",
            'login.min' => "Логин не менее 3 символов"
        ]);
        $u = User::create([
            'login' => $r->login,
            'password' => Hash::make($r->password)
        ]);

        Auth::login($u);
        return redirect('/');
    }
}
