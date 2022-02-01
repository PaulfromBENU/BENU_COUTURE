<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ContactController extends Controller
{
    public function show()
    {
        return view('contact');
    }

    public function showAll($locale, $page = '')
    {
        return view('client-service', ['page' => $page]);
    }
}
