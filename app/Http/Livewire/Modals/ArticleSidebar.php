<?php

namespace App\Http\Livewire\Modals;

use Livewire\Component;
use Illuminate\Support\Str;

use App\Models\Article;

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
            foreach ($this->article->photos as $photo) {
                array_push($this->article_pictures, $photo->file_name);
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
    }

    public function closeSideBar()
    {
        $this->emit('closeSideBar');
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
        $this->emit('wishlistUpdated', $this->article->id);
    }

    public function render()
    {
        return view('livewire.modals.article-sidebar');
    }
}
