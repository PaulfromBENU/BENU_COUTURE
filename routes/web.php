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

//All routes to be localized
Route::group([
	'prefix' => '{locale?}',
	'middleware' => 'setlocale'], function() {

	Route::get('/', 'GeneralController@home')->name('home');

	//Route::get('/'.trans("slugs.contact", [], 'en'), 'ContactController@show')->name('contact');

	Route::get('/models/{name?}', 'ModelController@show')->name('model-en');
	Route::get('/modeles/{name?}', 'ModelController@show')->name('model-fr');
	Route::get('/models-de/{name?}', 'ModelController@show')->name('model-de');
	Route::get('/models-lu/{name?}', 'ModelController@show')->name('model-lu');
	Route::get('/models/{name?}', 'ModelController@show')->name('model');

	Route::get('/models/{name?}/sold', 'ModelController@soldItems')->name('sold-en');
	Route::get('/modeles/{name?}/vendu', 'ModelController@soldItems')->name('sold-fr');
	Route::get('/modeles-de/{name?}/vendu-de', 'ModelController@soldItems')->name('sold-de');
	Route::get('/modeles-lu/{name?}/vendu-lu', 'ModelController@soldItems')->name('sold-lu');
	Route::get('/models/{name?}/sold', 'ModelController@soldItems')->name('sold');

	Route::get('/client-support/{page?}', 'ContactController@showAll')->name('client-service-en');
	Route::get('/service-client/{page?}', 'ContactController@showAll')->name('client-service-fr');
	Route::get('/service-client/{page?}', 'ContactController@showAll')->name('client-service-de');
	Route::get('/service-client/{page?}', 'ContactController@showAll')->name('client-service-lu');
	Route::get('/benu-service-client/{page?}', 'ContactController@showAll')->name('client-service');

	Route::get('/benu-the-full-story', 'GeneralController@showFullStory')->name('full-story-en');
	Route::get('/benu-toute-l-histoire', 'GeneralController@showFullStory')->name('full-story-fr');
	Route::get('/benu-toute-l-histoire-de', 'GeneralController@showFullStory')->name('full-story-de');
	Route::get('/benu-toute-l-histoire-lu', 'GeneralController@showFullStory')->name('full-story-lu');
	Route::get('/benu-toute-l-histoire', 'GeneralController@showFullStory')->name('full-story');

	Route::get('/benu-about', 'GeneralController@showAbout')->name('about-en');
	Route::get('/benu-a-propos', 'GeneralController@showAbout')->name('about-fr');
	Route::get('/benu-a-propos-de', 'GeneralController@showAbout')->name('about-de');
	Route::get('/benu-a-propos-lu', 'GeneralController@showAbout')->name('about-lu');
	Route::get('/benu-apropos', 'GeneralController@showAbout')->name('about');

	Route::get('/partenaires-benu-couture', 'GeneralController@showPartners')->name('partners');

	Route::get('/bons-achat', 'GeneralController@showVouchers')->name('vouchers');

	Route::get('/news/{slug?}', 'GeneralController@showNews')->name('news');

	Route::get('/dashboard/{section?}', 'UserController@show')->name('dashboard');

	require __DIR__.'/auth.php';
});