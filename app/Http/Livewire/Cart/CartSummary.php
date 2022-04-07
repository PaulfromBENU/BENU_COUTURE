<?php

namespace App\Http\Livewire\Cart;

use Livewire\Component;

use App\Models\Cart;

class CartSummary extends Component
{
    public $cart_id;
    public $articles_sum;
    public $delivery_sum;
    public $gift_sum;
    public $total;

    const GIFT_WRAP_PRICE = 5;
    const GIFT_CARD_PRICE = 3;

    protected $listeners = ['cartSumUpdated' => 'computeAll', 'giftUpdated' => 'computeAll'];

    public function mount()
    {
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
    }

    public function render()
    {
        return view('livewire.cart.cart-summary');
    }
}
