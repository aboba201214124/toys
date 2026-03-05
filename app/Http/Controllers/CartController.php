<?php

namespace App\Http\Controllers;

use App\Models\Cart;
use App\Models\CartProduct;
use App\Models\Order;
use App\Models\OrderProduct;
use App\Models\Product;
use App\Services\CartServices;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class CartController extends Controller
{
    public function cart()
    {
        $cartProducts = CartProduct::where('cart_id', Auth::user()->cart->id)->get();
        $totalSum = 0;
        foreach($cartProducts as $cartproduct) {
            $totalSum = $totalSum + ($cartproduct->count * $cartproduct->product->price);
        }
        return view('cart.cart', ['cartProducts' => $cartProducts, 'totalSum' => $totalSum]);
    }
    public function add($id)
    {
        $product = Product::FindOrFail($id);
        $cartId = Auth::user()->cart->id;
        $cartProduct = CartProduct::where(['cart_id' => $cartId,'product_id' => $id])->first();
        if($cartProduct) {
            $count = $cartProduct->count;
            $cartProduct->update([
                'count' => $count + 1,
            ]);
        } else {

            CartProduct::create([
                'cart_id' => Auth::user()->cart->id,
                'product_id' => $product->id,
                'count' => 1,
            ]);
        }
        return back();
    }
    public function minus($id)
    {
        $product = Product::FindOrFail($id);
        $cartId = Auth::user()->cart->id;
        $cartProduct = CartProduct::where(['cart_id' => $cartId,'product_id' => $id])->first();
        if($cartProduct) {
            $count = $cartProduct->count;
            $cartProduct->update([
                'count' => $count - 1,
            ]);
        }
        if ($cartProduct->count <= 0) {
            $cartProduct->delete();
        }
        return back();
    }
    public function destroy($id)
    {
        $product = Product::FindOrFail($id);
        $cartId = Auth::user()->cart->id;
        CartProduct::where(['cart_id' => $cartId,'product_id' => $id])->delete();
        return back();
    }
    public function clearAll()
    {
        $cartId = Auth::user()->cart->id;
        CartProduct::where(['cart_id' => $cartId])->delete();
        return back();
    }
    public function orderCreate()
    {
        return view('cart.ordercreate');
    }
    public function orderStore(Request $r)
    {
        $cartProducts = CartProduct::where('cart_id', Auth::user()->cart->id)->get();
        $totalSum = 0;
        foreach($cartProducts as $cartproduct) {
            $totalSum = $totalSum + ($cartproduct->count * $cartproduct->product->price);
        }
        $order = Order::create([
                'name' => $r->name,
                'phone' => $r->phone,
                'address' => $r->address,
                'user_id' => Auth::user()->id,
                'comment' => $r->comment,
                'status' => 0,
                'price' => $totalSum
            ]
        );
        foreach ($cartProducts as $item) {
            OrderProduct::create([
                'order_id' => $order->id,
                'product_id' => $item->product_id,
                'count' => $item->count,
            ]);
        }
        return redirect('/cart');
    }
    public function history() {
        $orders = Order::where('user_id', Auth::user()->id)->get();
        return view('cart.history', ['orders' => $orders]);
    }
}
