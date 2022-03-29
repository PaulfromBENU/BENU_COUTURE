<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\App;

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
	Route::get('/', 'GeneralController@landing')->name('landing');
} else {
	// Home does not need URI translation. Any locale may land on this page, middleware will ensure locale is prepended to the URI.
	// Same for auth requests, no translation needed.
	// Dashboard is also common to everyone, due to several redirections that would need to be handled in the auth process
	Route::group([
		'prefix' => '{locale?}',
		'middleware' => 'setlocale'], function() {
			Route::get('/', 'GeneralController@home')->name('home');
			Route::get('/dashboard', 'UserController@show')->name('dashboard');
			Route::get('/dashboard/{any}', function() {
				return redirect()->route('dashboard');
			});
			Route::post('/dashboard/addresses', 'UserController@addAddress')->name('dashboard.add-address');
			//Auth routes
			require __DIR__.'/auth.php';
	});

	// All other routes to be localized, by language. Separated route groups for each locale allows same translations for URIs in different languages, since localized prefix will ensure route names are unique.
	Route::group([
		'prefix' => 'lu',
		'middleware' => 'setlocale'], function() {

		Route::get('/'.trans("slugs.models", [], "lu").'/{name?}', 'ModelController@show')->name('model-lu');
		Route::get('/'.trans("slugs.models", [], "lu").'/{name}/'.trans("slugs.sold", [], "lu"), 'ModelController@soldItems')->name('sold-lu');
		Route::get('/'.trans("slugs.client-support", [], "lu").'/{page?}', 'ContactController@showAll')->name('client-service-lu');
		Route::get('/'.trans("slugs.full-story", [], "lu"), 'GeneralController@showFullStory')->name('full-story-lu');
		Route::get('/'.trans("slugs.about", [], "lu"), 'GeneralController@showAbout')->name('about-lu');
		Route::get('/'.trans("slugs.partners", [], "lu"), 'GeneralController@showPartners')->name('partners-lu');
		Route::get('/'.trans("slugs.vouchers", [], "lu"), 'GeneralController@showVouchers')->name('vouchers-lu');
		Route::get('/'.trans("slugs.news", [], "lu").'/{slug?}', 'GeneralController@showNews')->name('news-lu');
	});

	Route::group([
		'prefix' => 'fr',
		'middleware' => 'setlocale'], function() {

		Route::get('/'.trans("slugs.models", [], "fr").'/{name?}', 'ModelController@show')->name('model-fr');
		Route::get('/'.trans("slugs.models", [], "fr").'/{name}/'.trans("slugs.sold", [], "fr"), 'ModelController@soldItems')->name('sold-fr');
		Route::get('/'.trans("slugs.client-support", [], "fr").'/{page?}', 'ContactController@showAll')->name('client-service-fr');
		Route::get('/'.trans("slugs.full-story", [], "fr"), 'GeneralController@showFullStory')->name('full-story-fr');
		Route::get('/'.trans("slugs.about", [], "fr"), 'GeneralController@showAbout')->name('about-fr');
		Route::get('/'.trans("slugs.partners", [], "fr"), 'GeneralController@showPartners')->name('partners-fr');
		Route::get('/'.trans("slugs.vouchers", [], "fr"), 'GeneralController@showVouchers')->name('vouchers-fr');
		Route::get('/'.trans("slugs.news", [], "fr").'/{slug?}', 'GeneralController@showNews')->name('news-fr');

		Route::get('/import-creations', 'GeneralController@startImport');

		// Test of the landing page
		Route::get('/test-landing', 'GeneralController@landing')->name('landing');
	});

	Route::group([
		'prefix' => 'en',
		'middleware' => 'setlocale'], function() {

		Route::get('/'.trans("slugs.models", [], "en").'/{name?}', 'ModelController@show')->name('model-en');
		Route::get('/'.trans("slugs.models", [], "en").'/{name}/'.trans("slugs.sold", [], "en"), 'ModelController@soldItems')->name('sold-en');
		Route::get('/'.trans("slugs.client-support", [], "en").'/{page?}', 'ContactController@showAll')->name('client-service-en');
		Route::get('/'.trans("slugs.full-story", [], "en"), 'GeneralController@showFullStory')->name('full-story-en');
		Route::get('/'.trans("slugs.about", [], "en"), 'GeneralController@showAbout')->name('about-en');
		Route::get('/'.trans("slugs.partners", [], "en"), 'GeneralController@showPartners')->name('partners-en');
		Route::get('/'.trans("slugs.vouchers", [], "en"), 'GeneralController@showVouchers')->name('vouchers-en');
		Route::get('/'.trans("slugs.news", [], "en").'/{slug?}', 'GeneralController@showNews')->name('news-en');
	});

	Route::group([
		'prefix' => 'de',
		'middleware' => 'setlocale'], function() {

		Route::get('/'.trans("slugs.models", [], "de").'/{name?}', 'ModelController@show')->name('model-de');
		Route::get('/'.trans("slugs.models", [], "de").'/{name}/'.trans("slugs.sold", [], "de"), 'ModelController@soldItems')->name('sold-de');
		Route::get('/'.trans("slugs.client-support", [], "de").'/{page?}', 'ContactController@showAll')->name('client-service-de');
		Route::get('/'.trans("slugs.full-story", [], "de"), 'GeneralController@showFullStory')->name('full-story-de');
		Route::get('/'.trans("slugs.about", [], "de"), 'GeneralController@showAbout')->name('about-de');
		Route::get('/'.trans("slugs.partners", [], "de"), 'GeneralController@showPartners')->name('partners-de');
		Route::get('/'.trans("slugs.vouchers", [], "de"), 'GeneralController@showVouchers')->name('vouchers-de');
		Route::get('/'.trans("slugs.news", [], "de").'/{slug?}', 'GeneralController@showNews')->name('news-de');
	});

	Route::group([
		'middleware' => 'setlocale'], function() {
		Route::get('/{slug?}', 'ModelController@show')->where('slug', '[a-zA-Z0-9]{3, }');
	});
}