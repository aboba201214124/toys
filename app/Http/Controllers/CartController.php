<?php

namespace App\Http\Controllers;

use App\Models\Cart;
use App\Services\CartServices;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class CartController extends Controller
{
    public function cart()
    {
        return view('/profile/cart');
    }
    public function add($id)
    {
        $cartService = new CartServices();
        $cartService->add($id);
        return back();
    }
    public function minus($id)
    {
        $cartService = new CartServices();
        $cartService->minus($id);
        return back();
    }
    public function destroy($id)
    {
        $cartService = new CartServices();
        $cartService->destroy($id);
        return back();
    }
    public function clearAll()
    {
        $cartService = new CartServices();
        $cartService->clearAll();
        return back();
    }
}
