<?php

namespace App\Http\Livewire\Dashboard;

use Livewire\Component;

use Illuminate\Support\Facades\Auth;

use App\Traits\ArticleAnalyzer;

class DashboardNavigation extends Component
{
    use ArticleAnalyzer;

    public $section;
    public $couture_wishlisted_articles;
    public $couture_wishlisted_sold_articles;

    public function mount()
    {
        $this->getWishlistArticles();
    }

    public function getWishlistArticles()
    {
        $wishlisted_articles = auth::user()->wishlistArticles;
        $this->couture_wishlisted_articles = collect([]);
        $this->couture_wishlisted_sold_articles = collect([]);
        foreach ($wishlisted_articles as $wishlisted_article) {
            if ($this->stock($wishlisted_article) > 0) {
                $this->couture_wishlisted_articles->push($wishlisted_article);
            } else {
                $this->couture_wishlisted_sold_articles->push($wishlisted_article);
            }
        }
    }

    public function changeSection(string $section)
    {
        $this->section = $section;
    }

    public function render()
    {
        // In case the wishlist is requested, reload  the data to make sure it is loaded asobjects (necessary for overview component)
        if ($this->section == 'wishlist') {
            $this->getWishlistArticles();
        }
        return view('livewire.dashboard.dashboard-navigation');
    }
}
