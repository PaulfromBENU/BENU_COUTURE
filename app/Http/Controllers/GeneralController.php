<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

use App\Models\Article;
use App\Models\Creation;
use App\Models\CreationCategory;
use App\Models\Partner;
use App\Models\User;

use App\Traits\ArticleAnalyzer;
use App\Traits\DataImporter;

use App\Http\Requests\NewsletterRequest;

class GeneralController extends Controller
{
    use ArticleAnalyzer;
    use DataImporter;

    public function home()
    {
        // Reset payment on-going status to reach dashboard after connect
        session(['payment-ongoing' => 'inactive']);

        // Include last 6 creations where at least 1 article is present and in stock
        $latest_models = $this->getAvailableCreations()->slice(0, 6);

        return view('welcome', ['latest_models' => $latest_models]);
    }

    public function landing()
    {
        return view('landing');
    }

    public function landingEn()
    {
        return view('landing-en');
    }

    public function landingDe()
    {
        return view('landing-de');
    }

    public function landingLu()
    {
        return view('landing-lu');
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
        $vouchers = Article::where('name', 'voucher')->orderBy('voucher_type', 'asc')->get();

        return view('vouchers', ['vouchers' => $vouchers]);
    }

    public function showNews(string $slug = '')
    {
        if ($slug == '') {
            return view('news');
        }
        return view('news-single');
    }

    public function startImport()
    {
        if(auth::check() && auth::user()->role == 'admin') {
            set_time_limit(3600);
            // Article::query()->update(['checked' => '1']);
            // echo "*** Importation started...<br/>";
            // $this->importDataFromSophie();
            // $this->importCreationsFromLou();
            // $this->importCreationsFromSabine();
            // $this->createArticlesFromPictures();
            // $this->updateArticlesFromLouAndSophie();
            // $this->importTranslations();
        } else {
            return redirect()->route('login-fr');
        }
    }

    public function showNewsletter()
    {
        return view('newsletter');
    }

    public function storeNewsletter(NewsletterRequest $request)
    {
        $message = "";
        if (auth()->check()) {
            if (auth()->user()->newsletter == '1') {
                auth()->user()->newsletter = 0;
                auth()->user()->save();
                $message = __('auth.newsletter-unsubscribe-confirm');
            } else {
                auth()->user()->newsletter = 1;
                auth()->user()->save();
                $message = __('auth.newsletter-subscribe-confirm');
            }
        } else {
            if (User::where('email', $request->newsletter_email)->count() > 0) {
                $user = User::where('email', $request->newsletter_email)->first();
                $user->newsletter = 1;
                $user->save();
                $message = __('auth.newsletter-subscribe-confirm');
            } else {
                $user = new User();
                $user->email = $request->newsletter_email;
                $client_number = "C".rand(0, 9).rand(0, 9).rand(0, 9).rand(0, 9).rand(0, 9);
                while (User::where('client_number', $client_number)->count() > 0) {
                    $client_number = "C".rand(0, 9).rand(0, 9).rand(0, 9).rand(0, 9).rand(0, 9);
                }

                $user->client_number = $client_number;
                $user->first_name = $request->newsletter_first_name;
                $user->last_name = $request->newsletter_last_name;
                $user->newsletter = 1;
                $user->general_comment = "";
                if($user->save()) {
                    $message = __('auth.newsletter-subscribe-confirm');
                }
            }
        }

        return redirect()->route('newsletter-'.session('locale'))->with('success', $message);

    }
}
