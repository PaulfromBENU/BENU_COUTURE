<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ContactController extends Controller
{
    //Request mandatory in all functions to allow for parameters conservation in locale selector
    public function show()
    {
        return view('contact');
    }

    public function showAll($page = '')
    {
        return view('client-service', ['page' => $page]);
    }
}
