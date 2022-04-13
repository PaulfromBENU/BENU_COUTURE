<?php

namespace App\Http\Livewire\Modals;

use Livewire\Component;
use Illuminate\Support\Str;

use App\Models\Article;
use App\Models\Cart;

use Illuminate\Support\Facades\Auth;

use App\Traits\ArticleAnalyzer;

class ArticleSidebar extends Component
{
    use ArticleAnalyzer;

    public $sold;
    public $article_id;
    public $article_pictures;
    public $article;
    public $content;
    public $name_query;
    public $desc_query;
    public $singularity_query;
    public $fabric_query;
    public $explanation_query;
    public $keyword_query;
    public $is_wishlisted;
    public $article_description;
    public $full_desc;
    public $sent_to_cart;

    protected $listeners = ['ArticleModalReady' => "loadArticleDetails"];

    public function mount()
    {
        $this->article_pictures = [];
        $this->article = collect([]);
        $this->content = 'overview';
        $this->name_query = "name_".app()->getLocale();
        $this->desc_query = "description_".app()->getLocale();
        $this->singularity_query = "singularity_".app()->getLocale();
        $this->fabric_query = "fabric_".app()->getLocale();
        $this->explanation_query = "explanation_".app()->getLocale();
        $this->keyword_query = "keyword_".app()->getLocale();
        $this->is_wishlisted = 0;
        $this->article_description = "";
        $this->full_desc = 0;
        $this->sold = 0;
    }

    public function loadArticleDetails(int $article_id)
    {
        $this->article_id = $article_id;

        if (Cart::where('cart_id', session('cart_id'))->first()->couture_variations->contains($this->article_id)) {
            $this->sent_to_cart = 1;
        } else {
            $this->sent_to_cart = 0;
        }

        $this->full_desc = 0;
        $this->content = 'overview';
        if(Article::where('id', $article_id)->count() > 0) {
            $this->article = Article::find($article_id);
            $this->article_pictures = [];

            // Load wishlist status
            if (auth::check()) {
                if (auth::user()->wishlistArticles->contains($this->article->id)) {
                    $this->is_wishlisted = 1;
                } else {
                    $this->is_wishlisted = 0;
                }
            }

            // Load pictures
            foreach ($this->article->photos()->where('is_front', '1')->get() as $front_photo) {
                array_push($this->article_pictures, $front_photo->file_name);
            }
            foreach ($this->article->photos()->where('is_front', '<>', '1')->get() as $other_photo) {
                array_push($this->article_pictures, $other_photo->file_name);
            }

            // Send loading confirmation to JS
            $this->emit('articleLoaded');

            // Load description with limited number of words
            $query = $this->desc_query;
            $this->article_description = $this->article->creation->$query;
            $this->article_description_short = Str::words($this->article->creation->$query, 20, '...');

            // Determine if article is sold or not
            if($this->stock($this->article) == 0) {
                $this->sold = 1;
            } else {
                $this->sold = 0;
            }
        }
    }

    public function showFullDescription()
    {
        $this->full_desc = 1;
    }

    public function switchDisplay($action)
    {
        switch ($action) {
            case 'overview':
                $this->content = 'overview';
                break;

            case 'composition':
                $this->content = 'composition';
                break;

            case 'care':
                $this->content = 'care';
                break;

            case 'delivery':
                $this->content = 'delivery';
                break;

            case 'more':
                $this->content = 'more';
                break;
            
            default:
                $this->content = 'overview';
                break;
        }
        $this->emit('sidebarChange');
    }

    public function closeSideBar()
    {
        $this->emit('closeSideBar');
    }

    public function toggleWishlist()
    {
        if(auth::check()) {
            if ($this->is_wishlisted == 0) {
                // auth::user()->wishlistArticles()->attach($this->article->id);
                $this->is_wishlisted = 1;
            } else {
                // auth::user()->wishlistArticles()->detach($this->article->id);
                $this->is_wishlisted = 0;
            }
        }
        $this->emit('wishlistUpdated', $this->article->id);
    }

    public function addToCart()
    {
        $cart = Cart::firstOrNew([
            'cart_id' => session('cart_id')
        ]);
        $cart->is_active = 1;
        if (auth()->check()) {
            $cart->user_id = auth()->user()->id;
        }
        $cart->status = 1;// 0 = created, 1 = currently updated, 2 = paying, 3 = paid, 4 = abandoned
        if ($cart->save()) {
            $cart->couture_variations()->attach($this->article_id);
            $pivot = $this->article->available_shops()->first()->pivot;
            $pivot->decrement('stock');
            $pivot->increment('stock_in_cart');
            $this->sent_to_cart = 1;
            $this->emit('cartUpdated');
        }
    }

    public function render()
    {
        return view('livewire.modals.article-sidebar');
    }
}
