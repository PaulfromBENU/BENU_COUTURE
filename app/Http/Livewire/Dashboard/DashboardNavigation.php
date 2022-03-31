<?php

namespace App\Http\Livewire\Dashboard;

use Livewire\Component;

use Illuminate\Support\Facades\Auth;

use App\Traits\ArticleAnalyzer;
use App\Models\GeneralCondition;

class DashboardNavigation extends Component
{
    use ArticleAnalyzer;

    public $section;
    public $couture_wishlisted_articles;
    public $couture_wishlisted_vouchers;
    public $couture_wishlisted_sold_articles;
    public $general_conditions_date;
    public $general_conditions_content;

    protected $queryString = ['section' => ['except' => '', 'except' => 'overview']];

    public function mount()
    {
        $this->getWishlistArticles();
        $this->getLastGeneralConditions();
    }

    public function getWishlistArticles()
    {
        $wishlisted_articles = auth::user()->wishlistArticles;
        $this->couture_wishlisted_articles = collect([]);
        $this->couture_wishlisted_vouchers = collect([]);
        $this->couture_wishlisted_sold_articles = collect([]);
        foreach ($wishlisted_articles as $wishlisted_article) {
            if ($wishlisted_article->name == 'voucher') {
                $this->couture_wishlisted_vouchers->push($wishlisted_article);
            } else {
                if ($this->stock($wishlisted_article) > 0) {
                    $this->couture_wishlisted_articles->push($wishlisted_article);
                } else {
                    $this->couture_wishlisted_sold_articles->push($wishlisted_article);
                }
            }
        }
    }

    public function getLastGeneralConditions()
    {
        $this->general_conditions_date = "";
        $this->general_conditions_content = "";
        if (GeneralCondition::count() > 0) {
            $this->general_conditions_date = GeneralCondition::orderBy('created_at', 'desc')->first()->created_at->format('d\/m\/Y');
            $this->general_conditions_content = GeneralCondition::orderBy('created_at', 'desc')->first()->content;
        }
    }

    public function acceptNewConditions()
    {
        auth()->user()->last_conditions_agreed = '1';
        auth()->user()->save();
        $this->render();
    }

    public function changeSection(string $section)
    {
        $this->section = $section;
        if ($section == 'communications') {
            $this->emit('communicationsLoaded'); // Used to reload JS for accordeon behaviour
        }
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
