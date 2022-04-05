<?php

namespace App\Http\Livewire\Cart;

use Livewire\Component;

use App\Models\Cart;

class CartSummary extends Component
{
    public $cart_id;
    public $articles_sum;
    public $delivery_sum;
    public $total;

    protected $listeners = ['cartSumUpdated' => 'computeAll'];

    public function mount()
    {
        $this->computeAll();
    }

    public function computeAll()
    {
        $this->computeArticlesSum();
        $this->computeDeliverySum();
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

    public function computeTotal()
    {
        $this->total = $this->articles_sum + $this->delivery_sum;
    }

    public function render()
    {
        return view('livewire.cart.cart-summary');
    }
}
