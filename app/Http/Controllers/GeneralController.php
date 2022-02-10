<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Article;
use App\Models\Creation;
use App\Models\Partner;

use App\Traits\ArticleAnalyzer;


class GeneralController extends Controller
{
    use ArticleAnalyzer;

    public function home()
    {
        // Include last 6 creations where at least 1 article is present and in stock
        $latest_models = $this->getAvailableCreations()->slice(0, 6);

        return view('welcome', ['latest_models' => $latest_models]);
    }

    public function showFullStory()
    {
        return view('full-story');
    }

    public function showAbout()
    {
        return view('about');
    }

    public function showPartners()
    {
        $partners = Partner::orderBy('created_at', 'desc')->get();
        $localized_desc_query = "description_".app()->getLocale();
        return view('partners', ['partners' => $partners, 'desc_query' => $localized_desc_query]);
    }

    public function showVouchers()
    {
        $vouchers = Article::where('type', 'voucher')->orderBy('voucher_value', 'asc')->get();

        return view('vouchers', ['vouchers' => $vouchers]);
    }

    public function showNews(string $slug = '')
    {
        if ($slug == '') {
            return view('news');
        }
        return view('news-single');
    }
}
