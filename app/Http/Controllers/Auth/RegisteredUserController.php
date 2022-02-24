<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Models\User;
use App\Models\Address;
use App\Providers\RouteServiceProvider;
use Illuminate\Auth\Events\Registered;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\Rules;
use Illuminate\Validation\Rule;

class RegisteredUserController extends Controller
{
    /**
     * Display the registration view.
     *
     * @return \Illuminate\View\View
     */
    public function create()
    {
        return view('auth.register');
    }

    /**
     * Handle an incoming registration request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\RedirectResponse
     *
     * @throws \Illuminate\Validation\ValidationException
     */
    public function store(Request $request)
    {
        //Newsletter boolean to false if not checked
        if (!isset($request->register_newsletter)) {
            $request->register_newsletter = 0;
        }

        //Client number created randomly  - C#####
        $client_number = "C".rand(0, 9).rand(0, 9).rand(0, 9).rand(0, 9).rand(0, 9);
        while (User::where('client_number', $client_number)->count() > 0) {
            $client_number = "C".rand(0, 9).rand(0, 9).rand(0, 9).rand(0, 9).rand(0, 9);
        }

        $address_entered = false;
        
        //Case any address field has been provided, address info then becomes required
        if (isset($request->register_address_name) && strlen($request->register_address_name) > 0
            || isset($request->register_address_first_name) && strlen($request->register_address_first_name) > 0
            || isset($request->register_address_last_name) && strlen($request->register_address_last_name) > 0
            || isset($request->register_address_number) && strlen($request->register_address_number) > 0
            || isset($request->register_address_street) && strlen($request->register_address_street) > 0
            || isset($request->register_address_floor) && strlen($request->register_address_floor) > 0
            || isset($request->register_address_city) && strlen($request->register_address_city) > 0
            || isset($request->register_address_zip) && strlen($request->register_address_zip) > 0
            || isset($request->register_address_phone) && strlen($request->register_address_phone) > 0
            || isset($request->register_address_country) && strlen($request->register_address_country) > 0
            || isset($request->register_address_other) && strlen($request->register_address_other) > 0) {

            $address_entered = true;
            $request->validate([
                'email' => ['required', 'string', 'email', 'max:255', 'unique:mysql_common.users'],
                'register_password' => ['required', 'confirmed', Rules\Password::defaults()],
                'register_company' => ['nullable', 'string', 'max:255'],
                'register_phone' => ['nullable', 'string', 'max:30'],
                'register_gender' => ['nullable', 'string', 'max:7', Rule::in(['male', 'female', 'neutral'])],
                'register_first_name' => ['required', 'string', 'max:255'],
                'register_last_name' => ['required', 'string', 'max:255'],
                'register_age' => ['required', 'integer'],
                'register_legal' => ['required', 'integer'],
                'register_newsletter' => ['integer'],
                'register_address_name' => ['required', 'string', 'max:150'],
                'register_address_first_name' => ['required', 'string', 'max:255'],
                'register_address_last_name' => ['required', 'string', 'max:255'],
                'register_address_number' => ['required', 'integer'],
                'register_address_street' => ['required', 'string', 'max:255'],
                'register_address_floor' => ['nullable', 'string', 'max:255'],
                'register_address_city' => ['required', 'string', 'max:150'],
                'register_address_zip' => ['required', 'string', 'max:10'],
                'register_address_phone' => ['required', 'string', 'max:30'],
                'register_address_country' => ['required', 'string', 'max:50'],
                'register_address_other' => ['nullable', 'string', 'max:255'],
            ]);

            $new_address = new Address();
            $new_address->address_name = $request->register_address_name;
            $new_address->first_name = $request->register_address_first_name;
            $new_address->last_name = $request->register_address_last_name;
            $new_address->street_number = (int) $request->register_address_number;
            $new_address->street = $request->register_address_street;
            if (isset($request->register_address_floor)) {
                $new_address->floor = $request->register_address_floor;
            }
            $new_address->zip_code = $request->register_address_zip;
            $new_address->phone = $request->register_address_phone;
            $new_address->city = $request->register_address_city;
            $new_address->country = $request->register_address_country;
            if (isset($request->register_address_other)) {
                $new_address->other_infos = $request->register_address_other;
            }

        } else { //case no address provided, address data is nullable
            $request->validate([
                'email' => ['required', 'string', 'email', 'max:255', 'unique:mysql_common.users'],
                'register_password' => ['required', 'confirmed', Rules\Password::defaults()],
                'register_company' => ['nullable', 'string', 'max:255'],
                'register_phone' => ['nullable', 'string', 'max:30'],
                'register_gender' => ['nullable', 'string', 'max:7', Rule::in(['male', 'female', 'neutral'])],
                'register_first_name' => ['required', 'string', 'max:255'],
                'register_last_name' => ['required', 'string', 'max:255'],
                'register_age' => ['required', 'integer'],
                'register_legal' => ['required', 'integer'],
                'register_newsletter' => ['integer'],
                'register_address_name' => ['nullable', 'string', 'max:150'],
                'register_address_first_name' => ['nullable', 'string', 'max:255'],
                'register_address_last_name' => ['nullable', 'string', 'max:255'],
                'register_address_number' => ['nullable', 'integer'],
                'register_address_street' => ['nullable', 'string', 'max:255'],
                'register_address_floor' => ['nullable', 'string', 'max:255'],
                'register_address_city' => ['nullable', 'string', 'max:150'],
                'register_address_zip' => ['nullable', 'string', 'max:10'],
                'register_address_phone' => ['nullable', 'string', 'max:30'],
                'register_address_country' => ['nullable', 'string', 'max:50'],
                'register_address_other' => ['nullable', 'string', 'max:255'],
            ]);
        }

        //Create user in any case, even if no address has been added
        $user = User::create([
            'email' => $request->email,
            'password' => Hash::make($request->register_password),
            'role' => 'user',
            'first_name' => $request->register_first_name,
            'last_name' => $request->register_last_name,
            'gender' => $request->register_gender,
            'company' => $request->register_company,
            'phone' => $request->register_phone,
            'is_over_18' => $request->register_age,
            'legal_ok' => $request->register_legal,
            'newsletter' => $request->register_newsletter,
            'origin' => 'couture',
            'client_number' => $client_number,
            'general_comment' => "No comment",
        ]);

        //User creation was required to establish user_id
        if ($address_entered) {
            $new_address->user_id = $user->id;
            $new_address->save();
        }

        event(new Registered($user));

        Auth::login($user);

        return redirect(RouteServiceProvider::DASHBOARD);
    }
}
