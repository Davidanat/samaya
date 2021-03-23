<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Models\User;
use App\Providers\RouteServiceProvider;
use Illuminate\Auth\Events\Registered;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class RegisterController extends Controller
{
    /**
     * Display the registration view.
     *
     * @return \Illuminate\View\View
     */
    public function showRegistrationForm()
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
    public function register(Request $request)
    {
        $request->validate([
            'name'          => 'required|string|max:255',
            'email'         => 'required|string|email|max:255|unique:users',
            'password'      => 'required|string|confirmed|min:8',
            'address'       => 'nullable|string',
            'phone_number'  => 'numeric|regex:/^(08)([0-9]{0,16}\z)/',
            'city'          => 'string',
            'number_ktp'    => 'numeric',
            'number_npwp'   => 'numeric',
            'status'        => 'integer',
        ]);

        Auth::login($user = User::create([
            'name'          => $request->name,
            'email'         => $request->email,
            'password'      => Hash::make($request->password),
            'number_ktp'    => $request->number_ktp,
            'phone_number'  => $request->phone_number,
            'number_npwp'   => $request->number_npwp,
            'city'          => $request->city,
            'status'        => $request->status,
            // 'address'       => $request->address
        ]));

        event(new Registered($user));

        return redirect(RouteServiceProvider::HOME);
    }
}