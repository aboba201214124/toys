<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class MainController extends Controller
{
    public function index() {
        $categories = Category::all();
        $products = Product::all();
        return view('index', ['categories' => $categories, 'products'=>$products]);
    }
    public function categories() {
        $categories = Category::all();
        return view('categories', ['categories'=>$categories]);
    }
    public function products(Category $category) {
        $categories = Category::all();
        $products = Product::where('category_id', $category->id)->get();
        return view('products', [
            'categories'=>$categories,
            'category'=>$category,
            'products'=>$products,
        ]);
    }
    public function logout() {
        Auth::logout();
        return redirect('/');
    }
}
