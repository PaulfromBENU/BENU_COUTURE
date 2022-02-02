<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class GeneralController extends Controller
{
    public function home()
    {
        return view('welcome');
    }

    public function changeLocale(string $lang)
    {
        app()->setLocale($lang);

        return redirect()->back();
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
        return view('partners');
    }

    public function showVouchers()
    {
        return view('vouchers');
    }

    public function showNews(string $locale, string $slug = '')
    {
        if ($slug == '') {
            return view('news');
        }
        return view('news-single');
    }
}
