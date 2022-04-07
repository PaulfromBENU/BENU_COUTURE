<?php

namespace App\Http\Livewire\Cart;

use Livewire\Component;

use App\Models\Cart;
use App\Models\Voucher;

class CartSummary extends Component
{
    public $cart_id;
    public $articles_sum;
    public $delivery_sum;
    public $gift_sum;
    public $total;

    public $use_voucher;
    public $voucher_code;
    public $voucher_verified;
    public $voucher_current_value;
    public $voucher_remaining_value;
    public $voucher_status;


    const GIFT_WRAP_PRICE = 5;
    const GIFT_CARD_PRICE = 3;

    protected $listeners = ['cartSumUpdated' => 'computeAll', 'giftUpdated' => 'computeAll'];

    public function mount()
    {
        $this->use_voucher = 0;
        $this->voucher_code = "";
        $this->voucher_verified = 0;
        $this->voucher_remaining_value = 0;
        $this->voucher_status = 0;

        if (Cart::where('cart_id', $this->cart_id)->count() > 0) {
            $cart = Cart::where('cart_id', $this->cart_id)->first();

            if ($cart->use_voucher == 1) {
                $this->use_voucher = 1;
            }

            if ($cart->use_voucher == 1 && Voucher::where('unique_code', $cart->voucher_code)->count() > 0) {
                $this->voucher_code = $cart->voucher_code;
                $this->voucher_current_value = Voucher::where('unique_code', $cart->voucher_code)->first()->remaining_value;
                $this->voucher_verified = 1;
            }
        }

        $this->computeAll();
    }

    public function updatedVoucherCode()
    {
        $this->voucher_verified = 0;
        $this->voucher_current_value = 0;
        $this->voucher_remaining_value = 0;
        $this->voucher_status = 0;

        $this->computeAll();
    }

    public function updatedUseVoucher()
    {
        $cart = Cart::where('cart_id', $this->cart_id)->first();
        if ($this->use_voucher == true) {
            $cart->use_voucher = 1;
        } else {
            $cart->use_voucher = 0;
            $cart->voucher_code = "";
            $this->voucher_code = "";
            $this->voucher_verified = 0;
            $this->voucher_current_value = 0;
            $this->voucher_remaining_value = 0;
        }

        if($cart->save()) {
            $this->computeAll();
        }
    }

    public function checkVoucher()
    {
        if (Voucher::where('unique_code', $this->voucher_code)->count() > 0) {
            $cart = Cart::where('cart_id', $this->cart_id)->first();
            $cart->voucher_code = $this->voucher_code;
            if($cart->save()) {
                $this->voucher_verified = 1;
                $this->voucher_status = 0;
                if ($this->voucher_verified && $this->voucher_code !== "") {
                    $this->voucher_current_value = Voucher::where('unique_code', $this->voucher_code)->first()->remaining_value;
                }
            }
        } else {
            $this->voucher_current_value = 0;
            $this->voucher_verified = 0;
            $this->voucher_code = "";
            $this->voucher_status = 1;
        }

        $this->computeAll();
    }

    public function computeAll()
    {
        $this->computeArticlesSum();
        $this->computeDeliverySum();
        $this->computeGiftSum();
        $this->computeTotal();
    }

    public function computeArticlesSum()
    {
        if (Cart::where('cart_id', $this->cart_id)->count() > 0) {
            $cart = Cart::where('cart_id', $this->cart_id)->first();
            $sum = 0;
            foreach ($cart->couture_variations as $variation) {
                if ($variation->name == 'voucher') {
                    $article_amount = $variation->pivot->articles_number * $variation->pivot->value;
                } else {
                    $article_amount = $variation->pivot->articles_number * $variation->creation->price;
                }
                $sum += $article_amount;
            }
            $this->articles_sum = $sum;
        }
    }

    public function computeDeliverySum()
    {
        $this->delivery_sum = 0;
    }

    public function computeGiftSum()
    {
        $this->gift_sum = 0;
        if (Cart::where('cart_id', $this->cart_id)->count() > 0) {
            $cart = Cart::where('cart_id', $this->cart_id)->first();
            foreach ($cart->couture_variations as $variation) {
                if ($variation->pivot->is_gift && $variation->pivot->with_wrapping) {
                    $this->gift_sum += self::GIFT_WRAP_PRICE;
                }
                if ($variation->pivot->is_gift && $variation->pivot->with_card) {
                    $this->gift_sum += self::GIFT_CARD_PRICE;
                }
            }
        }
    }

    public function computeTotal()
    {
        $this->total = $this->articles_sum + $this->delivery_sum + $this->gift_sum;

        if ($this->total > $this->voucher_current_value) {
            $this->total -= $this->voucher_current_value;
            $this->voucher_remaining_value = 0;
        } else {
            $this->voucher_remaining_value = $this->voucher_current_value - $this->total;
            $this->total = 0;
        }
    }

    public function render()
    {
        return view('livewire.cart.cart-summary');
    }
}
