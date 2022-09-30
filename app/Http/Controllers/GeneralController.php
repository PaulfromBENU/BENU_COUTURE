<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Mail;

use App\Models\Article;
use App\Models\Creation;
use App\Models\CreationCategory;
use App\Models\NewsArticle;
use App\Models\Partner;
use App\Models\User;
use App\Models\Media;
use App\Mail\NewsletterConfirmation;
use App\Mail\NewsletterConfirmationForAdmin;
use App\Mail\NewsletterCancelConfirmationForAdmin;
use App\Exports\OrdersExport;

use App\Traits\ArticleAnalyzer;
use App\Traits\DataImporter;

use App\Http\Requests\NewsletterRequest;

use JeroenDesloovere\VCard\VCard;
use Maatwebsite\Excel\Facades\Excel;

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
        return view('header.pages.full-story');
    }

    public function showAbout()
    {
        return view('about');
    }

    public function showPartners()
    {
        return redirect()->route('home', ['locale' => app()->getLocale()]);
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
            if (app('env') == 'stage' || app('env') == 'local') {
                $all_news = NewsArticle::orderBy('updated_at', 'desc')->get();
            } else {
                $all_news = NewsArticle::where('is_ready', '1')->orderBy('updated_at', 'desc')->get();
            }
            return view('news', ['all_news' => $all_news]);
        }

        if (NewsArticle::where('slug_'.app()->getLocale(), $slug)->where('is_ready', '1')->count() > 0) {
            $news = NewsArticle::where('slug_'.app()->getLocale(), $slug)->first();
            $previous_news = NewsArticle::where('created_at', '>', $news->created_at)
                                          ->where('is_ready', '1')
                                          ->orderBy('created_at', 'asc')
                                          ->first();
            $next_news = NewsArticle::where('created_at', '<', $news->created_at)
                                      ->where('is_ready', '1')
                                      ->orderBy('created_at', 'desc')
                                      ->first();
            return view('news-single', ['news' => $news, 'previous_news' => $previous_news, 'next_news' => $next_news]);
        } elseif ((app('env') == 'stage' || app('env') == 'local') && NewsArticle::where('slug_'.app()->getLocale(), $slug)->count() > 0) {
            // In stage or local, articles can be displayed for test even if not validated.
            $news = NewsArticle::where('slug_'.app()->getLocale(), $slug)->first();
            $previous_news = NewsArticle::where('created_at', '>', $news->created_at)
                                          ->where('is_ready', '1')
                                          ->orderBy('created_at', 'asc')
                                          ->first();
            $next_news = NewsArticle::where('created_at', '<', $news->created_at)
                                      ->where('is_ready', '1')
                                      ->orderBy('created_at', 'desc')
                                      ->first();
            return view('news-single', ['news' => $news, 'previous_news' => $previous_news, 'next_news' => $next_news]);
        }

        return redirect()->route('news-'.app()->getLocale());
    }

    public function showNewsletter()
    {
        return view('newsletter');
    }

    public function storeNewsletter(NewsletterRequest $request)
    {
        $message = "";
        if (auth()->check()) {
            if (auth()->user()->newsletter == '2') {
                auth()->user()->newsletter = 3;
                auth()->user()->save();

                Mail::mailer('smtp_admin')->to('paul.guillard@benu.lu')->send(new NewsletterCancelConfirmationForAdmin(auth()->user()));
                Mail::mailer('smtp_admin')->to(config('mail.mailers.smtp_admin.admin_receiver'))->send(new NewsletterCancelConfirmationForAdmin(auth()->user()));

                $message = __('auth.newsletter-unsubscribe-pending');
                return redirect()->route('newsletter-'.session('locale'))->with('cancellation', $message);
            } else {
                auth()->user()->newsletter = 1;
                auth()->user()->favorite_language = session('locale');
                auth()->user()->save();
                $message = __('auth.newsletter-subscribe-confirm');
                // Mail::to(auth()->user()->email)->send(new NewsletterConfirmation(auth()->user()));
                Mail::mailer('smtp_admin')->to('paul.guillard@benu.lu')->send(new NewsletterConfirmationForAdmin(auth()->user()));
                Mail::mailer('smtp_admin')->to(config('mail.mailers.smtp_admin.admin_receiver'))->send(new NewsletterConfirmationForAdmin(auth()->user()));

                $message = __('auth.newsletter-subscribe-pending');
                return redirect()->route('newsletter-'.session('locale'))->with('subscription', $message);
            }
        } else {
            if (User::where('email', $request->newsletter_email)->count() > 0) {
                $user = User::where('email', $request->newsletter_email)->first();
                $user->newsletter = 1;
                $user->favorite_language = session('locale');
                $user->save();
                $message = __('auth.newsletter-subscribe-confirm');
                // Mail::to($user->email)->send(new NewsletterConfirmation($user));
                Mail::mailer('smtp_admin')->to('paul.guillard@benu.lu')->send(new NewsletterConfirmationForAdmin($user));
                Mail::mailer('smtp_admin')->to(config('mail.mailers.smtp_admin.admin_receiver'))->send(new NewsletterConfirmationForAdmin($user));
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
                $user->role = 'newsletter';
                $user->favorite_language = session('locale');
                $user->general_comment = "";
                if($user->save()) {
                    $message = __('auth.newsletter-subscribe-confirm');
                    // Mail::to($user->email)->send(new NewsletterConfirmation($user));
                    Mail::mailer('smtp_admin')->to('paul.guillard@benu.lu')->send(new NewsletterConfirmationForAdmin($user));
                    Mail::mailer('smtp_admin')->to(config('mail.mailers.smtp_admin.admin_receiver'))->send(new NewsletterConfirmationForAdmin($user));
                }
            }
            return redirect()->route('newsletter-'.session('locale'))->with('subscription', $message);
        }

    }

    public function cancelNewsletter(string $id)
    {
        $user_id = substr($id, 6);
        if (User::find($user_id)) {
            $user = User::find($user_id);
            if ($user->newsletter == '2') {
                $user->newsletter = 3;
                $user->save();
                Mail::mailer('smtp_admin')->to('paul.guillard@benu.lu')->send(new NewsletterCancelConfirmationForAdmin($user));
                Mail::mailer('smtp_admin')->to(config('mail.mailers.smtp_admin.admin_receiver'))->send(new NewsletterCancelConfirmationForAdmin($user));
            }
            return view('newsletter-cancelled');
        }
    }

    public function footerLegal()
    {
        return view('footer.pages.legal');
    }

    public function showParticipate($page = '')
    {
        // When changing locale while in a sub-section of the page, redirect to the page without parameter. Also handles random URI parameters.
        if (!in_array($page, [
            __('slugs.participate-badges'),
            __('slugs.participate-give'),
            __('slugs.participate-partnership'),
            __('slugs.participate-smart'),
            __('slugs.participate-sustainable'),
            ''
        ])) {
            return redirect()->route('header.participate-'.app()->getLocale());
        }

        if ($page == __('slugs.participate-badges')) {
            // Specific to badges section - initialize collection before if
        }

        if ($page == __('slugs.participate-give')) {
            // Specific to give clothes section - initialize collection before if
        }

        if ($page == __('slugs.participate-partnership') || $page == '') {
            
        }

        // $localized_desc_query = "description_".app()->getLocale();

        return view('header.pages.participate', ['page' => $page]);
    }


    public function downloadDropOff(Request $request)
    {
        // define vcard
        $vcard = new VCard();

        // define variables
        $lastname = $request->last_name;
        $firstname = $request->first_name;
        $additional = '';
        $prefix = '';
        $suffix = '';

        // add personal data
        $vcard->addName($lastname, $firstname, $additional, $prefix, $suffix);

        // add phone
        $vcard->addPhoneNumber($request->phone, 'PREF;WORK');

        // return vcard as a download
        return $vcard->download();
    }


    public function showPolicy()
    {
        return view('footer.pages.policy');
    }


    public function showGeneralInfo()
    {
        return view('footer.pages.general-info');
    }


    public function showMedias()
    {
        $articles = Media::where('family', 'article')->orderBy('publication_date', 'desc')->get();
        $podcasts = Media::where('family', 'radio')->orderBy('publication_date', 'desc')->get();
        $videos = Media::where('family', 'video')->orderBy('publication_date', 'desc')->get();
        $web_publications = Media::where('family', 'web')->orderBy('publication_date', 'desc')->get();

        return view('footer.pages.medias', [
            'articles' => $articles,
            'podcasts' => $podcasts,
            'videos' => $videos,
            'web_publications' => $web_publications,
        ]);
    }


    public function showGeneralConditions()
    {
        return view('footer.pages.general-conditions');
    }


    public function showAllCampaigns()
    {
        return view('campaigns');
    }

    public function showSingleCampaign(string $slug)
    {
        $campaign_slugs = [
            'carte-blanche',
        ];

        if (in_array($slug, $campaign_slugs)) {
            return view('campaigns.campaign-white-card');
        }
    }


    public function showSiteMap()
    {
        $clothes = $this->getAvailableCreations('clothes')->sortBy('name');
        $accessories = $this->getAvailableCreations('accessories')->sortBy('name');
        $home_items = $this->getAvailableCreations('home')->sortBy('name');
        $news = NewsArticle::where('is_ready', '1')->orderBy('updated_at', 'desc')->get();
        return view('footer.pages.sitemap', [
            'clothes' => $clothes, 
            'accessories' => $accessories, 
            'home_items' => $home_items, 
            'news' => $news,
        ]);
    }


    public function exportOrdersData(int $year, int $month) 
    {
        if (auth()->check() && auth()->user()->role == 'admin') {
            return Excel::download(new OrdersExport($year, $month), 'orders-'.str_pad($month, 2, '0', STR_PAD_LEFT).'-'.$year.'.csv');
        }
    }


    public function launchWebsite()
    {
        return view('launch-intro');
    }


    public function startImport()
    {
        if(auth::check() && auth::user()->role == 'admin') {
        // if(1 == 1) {
            echo "*** Time limit set to 3600s ***<br/>";
            set_time_limit(3600);
            // echo "*** Creating folders with creations names in 'to_be_processed' folder' ***<br/>";
            // $this->createModelsFolders();
            // Article::query()->update(['checked' => '1']);

            // !!! Run db:seed before executing the following, to fully clear and reset data before import

            // echo "*** Data importation started ***<br/>";
            // $this->importDataFromSophie();
            // $this->importCreationsFromLou();
            // $this->importCreationsFromSabine();

            // echo "*** Pictures and articles importation started ***<br/>";
            // $this->createArticlesFromPictures();
            // $this->updateArticlesFromLouAndSophie();

            // echo "*** Translations importation started ***<br/>";
            // $this->importTranslations();

            echo "*** Importation process complete! :) ***<br/>";
        } else {
            return redirect()->route('login-fr');
        }
    }
}
