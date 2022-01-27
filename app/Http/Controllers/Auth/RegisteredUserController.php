<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Models\User;
use App\Providers\RouteServiceProvider;
use Illuminate\Auth\Events\Registered;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\Rules;

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
        if (!isset($request->register_newsletter)) {
            $request->register_newsletter = 0;
        }
        
        $request->validate([
            'register_first_name' => ['required', 'string', 'max:255'],
            'register_last_name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:mysql_common.users'],
            'register_password' => ['required', 'confirmed', Rules\Password::defaults()],
            'register_newsletter' => ['integer'],
        ]);

        $user = User::create([
            'first_name' => $request->register_first_name,
            'last_name' => $request->register_last_name,
            'email' => $request->email,
            'password' => Hash::make($request->register_password),
            'role' => 'user',
            'newsletter' => $request->register_newsletter,
            'origin' => 'couture',
        ]);

        event(new Registered($user));

        Auth::login($user);

        return redirect(RouteServiceProvider::HOME);
    }
}
