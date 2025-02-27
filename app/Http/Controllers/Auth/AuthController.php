<?php

namespace App\Http\Controllers\Auth;

use App\Http\Requests\Auth\AuthenticateRequest;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class AuthController
{
    public function login()
    {
        return view('auth.login');
    }

    public function authenticate(AuthenticateRequest $request)
    {
        $user = User::where('name', $request->input('login'))->first();

        if (! $user) {
            return redirect()->back();
        }

        if (! Hash::check($request->input('password'), $user->password)) {
            return redirect()->back();
        }

        Auth::login($user);

        return redirect()->route('songs.index')->with('success', 'Вход выполнен успешно');
    }

    public function logout()
    {
        Auth::logout();

        return redirect()->route('auth.login');
    }
}
