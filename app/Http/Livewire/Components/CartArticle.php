<?php

namespace App\Http\Livewire\Components;

use Livewire\Component;

use App\Models\Article;

class CartArticle extends Component
{

    public $article_id;
    public $is_wishlisted;
    public $is_gift;
    public $max_number;
    public $number;

    public function mount() {
        if (auth()->check()) {
            if (auth()->user()->wishlistArticles->contains($this->article_id)) {
                $this->is_wishlisted = 1;
            } else {
                $this->is_wishlisted = 0;
            }
        }
        $this->is_gift = false;

        if (Article::find($this->article_id) && Article::find($this->article_id)->name == 'voucher') {
            $this->max_number = 100;
        } elseif (Article::find($this->article_id) && Article::find($this->article_id)->shops()->where('filter_key', 'benu-esch')->first()->pivot->stock > 1) {
            $this->max_number = Article::find($this->article_id)->shops()->where('filter_key', 'benu-esch')->first()->pivot->stock;
        } else {
            $this->max_number = 1;
        }

        if (Article::find($this->article_id) && Article::find($this->article_id)->carts()->where('carts.cart_id', session('cart_id'))->count() > 0) {

            $cart = Article::find($this->article_id)->carts()->where('carts.cart_id', session('cart_id'))->first();
            $this->number = $cart->pivot->articles_number;
        }
    }

    public function toggleWishlist()
    {
        if(auth()->check()) {
            if ($this->is_wishlisted == 0) {
                auth()->user()->wishlistArticles()->attach($this->article_id);
                $this->is_wishlisted = 1;
            } else {
                auth()->user()->wishlistArticles()->detach($this->article_id);
                $this->is_wishlisted = 0;
            }
        }
    }

    public function updateNumber($direction)
    {
        if ($direction == 'up') {
            $this->number = min($this->max_number, $this->number + 1);
        } else {
            $this->number = max(1, $this->number - 1);
            // if ($this->number - 1 == 0) {
            //     $this->removeItem();
            // } else {
            //     $this->number --;
            // }
        }
        if (Article::find($this->article_id) && Article::find($this->article_id)->carts()->where('carts.cart_id', session('cart_id'))->count() > 0) {

            $cart = Article::find($this->article_id)->carts()->where('carts.cart_id', session('cart_id'))->first();
            $cart->pivot->articles_number = $this->number;
            $cart->pivot->save();
        }
        $this->emit('cartSumUpdated');
    }

    public function removeItem()
    {
        $this->emit('articleRemoved', $this->article_id);
    }

    public function render()
    {
        return view('livewire.components.cart-article', [
            'article' => Article::find($this->article_id)
        ]);
    }
}
