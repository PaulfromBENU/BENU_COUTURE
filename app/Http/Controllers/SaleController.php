<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

use App\Models\Article;
use App\Models\Cart;

class SaleController extends Controller
{
    public function showCart()
    {
        if (session('cart_id') !== null && Cart::where('cart_id', session('cart_id'))->count() > 0) {
            $cart = Cart::where('cart_id', session('cart_id'))->first();
            $cart_id = $cart->cart_id;
            $cart_count = $cart->couture_variations()->count();
        } else {
            $cart_id = 0;
            $cart_count = 0;
        }

        // Create logic to get articles in cart based on session id
        return view('cart', ['cart_id' => $cart_id, 'cart_count' => $cart_count]);
    }
}
