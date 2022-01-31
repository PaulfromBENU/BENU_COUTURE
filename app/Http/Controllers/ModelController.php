<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ModelController extends Controller
{
    public function __construct(Request $request)
    {
        $model_name = $request->name;
        //For locale change. Slug is memorized when first coming to the page, and reinjected in case of locale change. Added to avoid parameters in header locale link.
        if ($model_name == '' || $model_name == null) {
            if (session('model_name') != null) {
                $model_name = session('model_name');
                $request->session()->forget('model_name');
                return redirect()->route('model', ['locale' => app()->getLocale(), 'name' => $model_name]);
            }
            return redirect()->route('home');//To be changed to page full with models
        }
        //$request->session()->put('model_name', $model_name);
    }

    public function show()
    {
        return view('model');
    }

    public function soldItems() 
    {
        return view('sold-items');
    }
}
