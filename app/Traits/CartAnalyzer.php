<?php

namespace App\Traits;

use App\Models\Cart;
use App\Models\Voucher;

trait CartAnalyzer {

    public $gift_wrap_price = 5;
    public $gift_card_price = 3;

    public function computeArticlesSum($cart_id)
    {
        if (Cart::where('cart_id', $cart_id)->count() > 0) {
            $cart = Cart::where('cart_id', $cart_id)->first();
            $sum = 0;
            foreach ($cart->couture_variations as $variation) {
                if ($variation->name == 'voucher') {
                    $article_amount = $variation->pivot->articles_number * $variation->pivot->value;
                } else {
                    $article_amount = $variation->pivot->articles_number * $variation->creation->price;
                }
                $sum += $article_amount;
            }
            return $sum;
        }
        return 0;
    }

    public function computeDeliverySum()
    {
        $this->delivery_sum = 0;
    }

    public function computeGiftSum($cart_id)
    {
        $gift_sum = 0;
        if (Cart::where('cart_id', $cart_id)->count() > 0) {
            $cart = Cart::where('cart_id', $cart_id)->first();
            foreach ($cart->couture_variations as $variation) {
                if ($variation->pivot->is_gift && $variation->pivot->with_wrapping) {
                    $gift_sum += $this->gift_wrap_price;
                }
                if ($variation->pivot->is_gift && $variation->pivot->with_card) {
                    $gift_sum += $this->gift_card_price;
                }
            }
        }

        return $gift_sum;
    }

    public function computeTotal($cart_id)
    {
    	$cart = Cart::where('cart_id', $cart_id)->first();
        $total = $this->computeArticlesSum($cart_id) + $this->computeDeliverySum() + $this->computeGiftSum($cart_id);

        if ($cart->use_voucher == 1 && Voucher::where('unique_code', $cart->voucher_code)->count() > 0) {
        	$voucher = Voucher::where('unique_code', $cart->voucher_code)->first();
        	if ($total > $voucher->remaining_value) {
	            $total -= $voucher->remaining_value;
	        } else {
	            $total = 0;
	        }
        }

        return $total;
    }
}