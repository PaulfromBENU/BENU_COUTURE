<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\Shop;

class ContactController extends Controller
{
    //Request mandatory in all functions to allow for parameters conservation in locale selector
    public function show()
    {
        return view('contact');
    }

    public function showAll($page = '')
    {
        // When changing locale while in a sub-section of the page, redirect to the page without parameter. Also handles random URI parameters.
        if (!in_array($page, [
            __('slugs.services-faq'),
            __('slugs.services-delivery'),
            __('slugs.services-sizes'),
            __('slugs.services-return'),
            __('slugs.services-payment'),
            __('slugs.services-care'),
            __('slugs.services-shops'),
            __('slugs.services-contact'),
            ''
        ])) {
            return redirect()->route('client-service-'.app()->getLocale());
        }

        $shops_benu = collect([]);
        $shops_other = collect([]);
        if ($page == __('slugs.services-shops')) {
            $shops_benu = Shop::where('type', 'BENU owned')->orderBy('created_at', 'desc')->get();
            $shops_other = Shop::where('type', '<>', 'BENU owned')->orderBy('created_at', 'desc')->get();
        }
        $localized_desc_query = "description_".app()->getLocale();

        return view('client-service', ['page' => $page, 'shops_benu' => $shops_benu, 'shops_other' => $shops_other, 'desc_query' => $localized_desc_query]);
    }
}
