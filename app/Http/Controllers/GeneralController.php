<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class GeneralController extends Controller
{
    public function home()
    {
        return view('welcome');
    }

    public function changeLocale($lang)
    {
        app()->setLocale($lang);

        return redirect()->back();
    }
}
