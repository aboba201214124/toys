<?php

namespace App\Services;

use App\Models\Cart;
use App\Models\Product;
use Illuminate\Support\Facades\Auth;

class CartServices
{
    public function add($id,$quantity = 1)
    {
        $product = Product::FindOrFail($id);
        $cart = Auth::user()->cart();
            $cartproduct = $cart->where('product_id', $id)->first();
            $quant_current = 0;
        if($cartproduct) {
            $quant_current = $cartproduct->pivot->quantity;
            $cart->updateExistingPivot($id, ['quantity' => $quant_current + $quantity]);

        } else {
            $cart->attach($id, ['quantity' => $quantity]);
        }
        $result = ['status'=> true, 'quantity' => $quant_current];
        return $result;
    }

    public function minus($id,$quantity = 1)
    {
        $cart = Auth::user()->cart();
        $cartproduct = $cart->where('product_id', $id)->first();
        if($cartproduct) {
            $quant_current = $cartproduct->pivot->quantity;
            if($quant_current > 1)
            $cart->updateExistingPivot($id, ['quantity' => $quant_current - $quantity]);

        } else {
            $cart->attach($id, ['quantity' => $quantity]);
        }
        $result = ['status'=> true, 'quantity' => $quant_current];
        return $result;
    }
    public function destroy($id)
    {
        Auth::user()->cart()->detach($id);
        return true;
    }
    public function clearAll()
    {
        $cart = Auth::user()->cart();
        Auth::user()->cart()->detach($cart->get());
        $result = ['status'=> true];
        return $result;
    }
    static function count() {
        $cart = Auth::user()->cart();
        $sum = $count = 0;
        foreach($cart->get() as $item) {
            $sum += $item->price * $item->pivot->quantity;
            $count += $item->pivot->quantity;
        }
        return ['count' => $count, 'sum' => $sum];
    }
}
