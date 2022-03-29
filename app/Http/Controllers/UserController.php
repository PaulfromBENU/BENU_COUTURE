<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

use App\Models\Address;
use App\Models\User;

use App\Http\Requests\AddressRequest;

class UserController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function show(string $locale, Request $request)
    {
        if (!isset($request->section) || !in_array($request->section, ['overview', 'addresses', 'orders', 'demands', 'returns', 'wishlist', 'details', 'delete'])) {
            $section = 'overview';
        } else {
            $section = $request->section;
        }
        return view('dashboard', ['section' => $section]);
    }

    public function addAddress(string $locale, AddressRequest $request)
    {
        if ($request->address_id == 0) {
            $address = new Address();
            $address->user_id = Auth::id();
        } elseif (Auth::user()->addresses->contains($request->address_id)) {
            $address = Address::find($request->address_id);
        } else {
            return redirect()->route('dashboard', ['locale' => $locale, 'section' => 'addresses'])->with('error', "An error occured.");
        }

        $address->address_name = $request->register_address_name;
        $address->first_name = $request->register_address_first_name;
        $address->last_name = $request->register_address_last_name;
        $address->street_number = $request->register_address_number;
        $address->street = $request->register_address_street;
        if (isset($request->register_address_floor)) {
            $address->floor = $request->register_address_floor;
        } else {
            $address->floor = "";
        }
        $address->zip_code = $request->register_address_zip;
        $address->city = $request->register_address_city;
        $address->country = $request->register_address_country;
        $address->phone = $request->register_address_phone;
        if (isset($request->register_address_other)) {
            $address->other_infos = $request->register_address_other;
        }

        if ($address->save()) {
            return redirect()->route('dashboard', ['locale' => $locale, 'section' => 'addresses']);
        }
    }
}
