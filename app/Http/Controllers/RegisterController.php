<?php

namespace App\Http\Controllers;

use App\Models\Cart;
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
            'email' => "unique:users,email|min:3|max:15|required",
            'password' => "min:3|max:100|required|confirmed",
        ], [
            'password.confirmed' => "Пароли не совпадают",
            'email.min' => "Логин не менее 3 символов"
        ]);
        $u = User::create([
            'email' => $r->email,
            'password' => Hash::make($r->password)
        ]);
        Cart::create([
            'user_id' => $u->id
        ]);

        Auth::login($u);
        return redirect('/');
    }
}
