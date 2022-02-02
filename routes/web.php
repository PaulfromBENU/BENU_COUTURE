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

// Redirect welcome page to localized page if not specified
// Route::get('/', function () {
//     return redirect()->route('home', ['locale' => app()->getLocale()]);
// });  

//All routes to be localized
Route::group([
	'prefix' => '{locale?}',
	'middleware' => 'setlocale'], function() {
	Route::get('/', 'GeneralController@home')->name('home');

	Route::get('/'.trans("slugs.contact"), 'ContactController@show')->name('contact');

	Route::get('/models/{name?}', 'ModelController@show')->name('model');

	Route::get('/models/{name}/sold', 'ModelController@soldItems')->name('sold');

	Route::get('/service-client/{page?}', 'ContactController@showAll')->name('client-service');

	Route::get('/benu-toute-l-histoire', 'GeneralController@showFullStory')->name('full-story');

	Route::get('/benu-a-propos', 'GeneralController@showAbout')->name('about');

	Route::get('/partenaires-benu-couture', 'GeneralController@showPartners')->name('partners');

	Route::get('/bons-achat', 'GeneralController@showVouchers')->name('vouchers');

	Route::get('/news/{slug?}', 'GeneralController@showNews')->name('news');

	require __DIR__.'/auth.php';
});

//Route::get('/change-lang/{lang}', 'GeneralController@changeLocale')->name('locale.update');

// Route::get('/dashboard', function () {
//     return view('dashboard');
// })->middleware(['auth'])->name('dashboard');
