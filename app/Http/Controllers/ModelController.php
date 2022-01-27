<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ModelController extends Controller
{
    public function show(Request $request)
    {
        $model_name = $request->name;
        //For locale change. Slug is memorized when first coming to the page, and reinjected in case of locale change
        if ($model_name == '') {
            if (session('model_name') != null) {
                return redirect()->route('model', ['locale' => app()->getLocale(), 'name' => session('model_name')]);
            }
            return redirect()->route('home');//To be changed to page full with models
        }
        session(['model_name' => $model_name]);
        return view('model');
    }
}
