<?php

namespace App\Http\Controllers\Auth;

use App\Http\Requests\Auth\AuthenticateRequest;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\MessageBag;

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
            $messageBag = new MessageBag([
                'login' => __('Неверные данные'),
                'password' => __('Неверные данные'),
            ]);

            return redirect()->back()->withErrors($messageBag)->withInput($request->all());
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
