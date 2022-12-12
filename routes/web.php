<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\App;

use App\Models\User;
use App\Mail\UserRegistered;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

// In case of landing page activated (use 'landing' as APP_ENV), only the landing page is available from the root address

if (app('env') == 'landing') {
	Route::get('/{slug}', function() {
		return redirect()->route('landing');
	})->where('slug', '^([a-zA-Z0-9-]{3,})$');

	Route::get('/', function() {
		return redirect()->route('landing');
	});

	Route::get('/fr', 'GeneralController@landing')->name('landing');
	Route::get('/en', 'GeneralController@landingEn')->name('landing-en');
	Route::get('/de', 'GeneralController@landingDe')->name('landing-de');
	Route::get('/lu', 'GeneralController@landingLu')->name('landing-lu');
} else {
	// The following routes do not need URI translation. Any locale may land on this page, middleware will ensure locale is prepended to the URI.
	// Same for auth requests, no translation needed.
	// Dashboard is also common to all locales, to avoid several redirections that would need to be handled in the auth process
	Route::group([
		'prefix' => '{locale?}',
		'middleware' => 'setlocale'], function() {
			Route::get('/', 'GeneralController@home')->name('home');

			Route::get('/dashboard', 'UserController@show')->name('dashboard')->middleware('createcart');
			Route::get('/dashboard/{any}', function() {
				return redirect()->route('dashboard');
			});

			Route::post('/dashboard/addresses', 'UserController@addAddress')->name('dashboard.add-address');

			Route::post('/store-newsletter', 'GeneralController@storeNewsletter')->name('newsletter-subscribe');

			Route::get('/add-kulturpass', function() {
				session(['has_kulturpass' => '1']);
				return redirect()->back();
			})->name('add-kulturpass');
			Route::get('/forget-kulturpass', function() {
				session(['has_kulturpass' => null]);
				return redirect()->back();
			})->name('forget-kulturpass');

			Route::post('/validate-stage-session', 'GeneralController@accessStage')->name('stage-access');
			
			//Auth routes
			require __DIR__.'/auth.php';
	});

	// All other routes to be localized, by language. Separated route groups for each locale allows same translations for URIs in different languages, since localized prefix will ensure route names are unique.
	$all_locales = ['fr', 'en', 'de', 'lu'];
	foreach ($all_locales as $locale) {
		Route::group([
			'prefix' => $locale,
			'middleware' => 'setlocale'], function() use($locale) {

			// Models Pages
			Route::get('/'.trans("slugs.models", [], $locale).'/{name?}', 'ModelController@show')->name('model-'.$locale)->middleware('createcart');
			Route::get('/'.trans("slugs.models", [], $locale).'/{name}/'.trans("slugs.sold", [], $locale), 'ModelController@soldItems')->name('sold-'.$locale);
			Route::get('/'.trans("slugs.vouchers", [], $locale), 'GeneralController@showVouchers')->name('vouchers-'.$locale)->middleware('createcart');

			// Client Support
			Route::get('/'.trans("slugs.client-support", [], $locale).'/{page?}', 'ContactController@showAll')->name('client-service-'.$locale);

			// About BENU Pages
			Route::get('/'.trans("slugs.full-story", [], $locale), 'GeneralController@showFullStory')->name('full-story-'.$locale);
			Route::get('/'.trans("slugs.about", [], $locale), 'GeneralController@showAbout')->name('about-'.$locale);

			// Partners Page
			Route::get('/'.trans("slugs.partners", [], $locale), 'GeneralController@showPartners')->name('partners-'.$locale);

			// News pages
			Route::get('/'.trans("slugs.news", [], $locale).'/{slug?}', 'GeneralController@showNews')->name('news-'.$locale);

			// Landing page
			Route::get('/test-landing-'.$locale, 'GeneralController@landingLu')->name('landing-'.$locale);

			// Cart and Payment Pages
			Route::get('/'.trans("slugs.cart", [], $locale), 'SaleController@showCart')->name('cart-'.$locale)->middleware('createcart');

			Route::get('/'.trans("slugs.payment", [], $locale), 'SaleController@showPayment')->name('payment-'.$locale);
			Route::get('/'.trans("slugs.process-payment", [], $locale).'/{order}', 'SaleController@cardPayment')->name('payment-request-'.$locale);
			Route::get('/'.trans("slugs.process-paypal-payment", [], $locale).'/{order}', 'SaleController@paypalPayment')->name('payment-request-paypal-'.$locale);
			Route::post('/'.trans("slugs.payment-by-card", [], $locale), 'SaleController@payByCard')->name('payment-process-'.$locale);
			Route::get('/'.trans("slugs.payment-validation", [], $locale).'/{order}', 'SaleController@validatePayment')->name('payment-validate-'.$locale);
			Route::get('/'.trans("slugs.processed-payment", [], $locale).'/{order}', 'SaleController@showValidPayment')->name('payment-processed-'.$locale);

			// Newsletter Pages
			Route::get('/'.trans("slugs.newsletter-subscribe", [], $locale), 'GeneralController@showNewsletter')->name('newsletter-'.$locale);
			Route::get('/'.trans("slugs.newsletter-unsubscribe", [], $locale).'/{id}', 'GeneralController@cancelNewsletter')->name('newsletter-stop-'.$locale);

			// Participate
			Route::get('/'.trans("slugs.header-participate", [], $locale).'/{page?}', 'GeneralController@showParticipate')->name('header.participate-'.$locale);

			// Contact download for phone
			Route::get('/'.trans("slugs.header-download-drop-off", [], $locale), 'GeneralController@downloadDropOff')->name('header.download-dropoff-'.$locale);

			// Display PDF documents
			Route::get('/'.trans("slugs.return", [], $locale).'/{order_code}', 'SaleController@displayReturn')->name('return-'.$locale);
			Route::get('/'.trans("slugs.invoice", [], $locale).'/{order_code}', 'SaleController@displayInvoice')->name('invoice-'.$locale);
			Route::get('/'.trans("slugs.invoice-download", [], $locale).'/{order_code}', 'SaleController@downloadInvoice')->name('invoice-download-'.$locale);
			Route::get('/'.trans("slugs.show-voucher", [], $locale).'/{voucher_code}', 'UserController@displayVoucher')->name('show-voucher-pdf-'.$locale);
			Route::get('/'.trans("slugs.order-download", [], $locale).'/{order_code}', 'GeneralController@downloadOrder')->name('order-download-'.$locale);

			// CSV export for admin
			Route::get('/invoice-export-csv/{year}/{month}', 'GeneralController@exportOrdersData')->name('export-invoice-csv-'.$locale);

			// Footer Pages
			Route::get('/'.trans("slugs.footer-legal-mentions", [], $locale), 'GeneralController@footerLegal')->name('footer.legal-'.$locale);
			Route::get('/'.trans("slugs.footer-policy", [], $locale), 'GeneralController@showPolicy')->name('footer.policy-'.$locale);
			Route::get('/'.trans("slugs.footer-general-info", [], $locale), 'GeneralController@showGeneralInfo')->name('footer.general-info-'.$locale);
			Route::get('/'.trans("slugs.footer-medias", [], $locale), 'GeneralController@showMedias')->name('footer.medias-'.$locale);
			Route::get('/'.trans("slugs.general-conditions", [], $locale), 'GeneralController@showGeneralConditions')->name('footer.general-conditions-'.$locale);
			Route::get('/'.trans("slugs.sitemap", [], $locale), 'GeneralController@showSiteMap')->name('footer.sitemap-'.$locale);

			// Campaigns
			Route::get('/'.trans("slugs.campaigns", [], $locale), 'GeneralController@showAllCampaigns')->name('campaigns-'.$locale);
			Route::get('/'.trans("slugs.campaigns", [], $locale).'/{slug}', 'GeneralController@showSingleCampaign')->name('campaign-single-'.$locale);

			// Test and data importation pages - for admin only
			Route::get('/test-mail', function() {
				$user = User::find(2);

				return new UserRegistered($user);
			});
			Route::get('/import-data', 'GeneralController@startImport');

			// Launch page
			Route::get('/launch', 'GeneralController@launchWebsite')->name('launch');

			// QR code generation
			Route::get('/qr-code/{name}/{number?}', 'GeneralController@generateQrCode')->name('qr-code');
		});
	}

	Route::group([
		'middleware' => 'setlocale'], function() {
		Route::get('/{slug?}', 'ModelController@show')->where('slug', '[a-zA-Z0-9]{3,}');
	});
}