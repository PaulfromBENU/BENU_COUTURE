<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ModelController extends Controller
{
    public function show(Request $request)
    {
        $model_name = $request->name;
        //For locale change. Slug is memorized when first coming to the page, and reinjected in case of locale change. Added to avoid parameters in header locale link.
        if ($model_name == '' || $model_name == null) {
        //     if (session('model_name') != null) {
        //         $model_name = session('model_name');
        //         $request->session()->forget('model_name');
        //         return redirect()->route('model', ['locale' => app()->getLocale(), 'name' => $model_name]);
        //     }
            return view('models');
        }

        // $request->session()->flash('model_name', $model_name);

        return view('model');
    }

    public function soldItems(string $name) 
    {
        return view('sold-items');
    }
}
