<?php

use Illuminate\Support\Facades\Route;

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

	Route::get('/'.trans("slugs.contact", [], 'fr'), 'ContactController@show')->name('contact');

	Route::get('/models/{name?}', 'ModelController@show')->name('model');

	Route::get('/models/{name?}/sold', 'ModelController@soldItems')->name('sold');

	Route::get('/service-client/{page?}', 'ContactController@showAll')->name('client-service');

	Route::get('/'.trans("slugs.full-story", [], 'fr'), 'GeneralController@showFullStory')->name('full-story');

	Route::get('/benu-a-propos', 'GeneralController@showAbout')->name('about');

	Route::get('/partenaires-benu-couture', 'GeneralController@showPartners')->name('partners');

	Route::get('/bons-achat', 'GeneralController@showVouchers')->name('vouchers');

	Route::get('/news/{slug?}', 'GeneralController@showNews')->name('news');

	Route::get('/dashboard/{section?}', 'UserController@show')->name('dashboard');

	require __DIR__.'/auth.php';
});