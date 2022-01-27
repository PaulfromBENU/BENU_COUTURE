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

	Route::get('/contact', 'GeneralController@contact')->name('contact');

	require __DIR__.'/auth.php';
});

// Route::get('/dashboard', function () {
//     return view('dashboard');
// })->middleware(['auth'])->name('dashboard');
