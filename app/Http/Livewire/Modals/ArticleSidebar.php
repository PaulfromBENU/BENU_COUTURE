<?php

namespace App\Http\Livewire\Modals;

use Livewire\Component;

use App\Models\Article;

use Illuminate\Support\Facades\Auth;

class ArticleSidebar extends Component
{
    public $article_id;
    public $article_pictures;
    public $article;
    public $content;
    public $name_query;
    public $is_wishlisted;

    protected $listeners = ['ArticleModalReady' => "loadArticleDetails"];

    public function mount()
    {
        $this->article_pictures = [];
        $this->article = collect([]);
        $this->content = 'overview';
        $this->name_query = "name_".app()->getLocale();
        $this->is_wishlisted = 0;
    }

    public function loadArticleDetails(int $article_id)
    {
        $this->article_id = $article_id;
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
            foreach ($this->article->photos as $photo) {
                array_push($this->article_pictures, $photo->file_name);
            }

            // Send loading confirmation to JS
            $this->emit('articleLoaded');
        }
    }

    public function toggleWishlist()
    {
        if(auth::check()) {
            if ($this->is_wishlisted == 0) {
                auth::user()->wishlistArticles()->attach($this->article->id);
                $this->is_wishlisted = 1;
            } else {
                auth::user()->wishlistArticles()->detach($this->article->id);
                $this->is_wishlisted = 0;
            }
        }
    }

    public function render()
    {
        return view('livewire.modals.article-sidebar');
    }
}
