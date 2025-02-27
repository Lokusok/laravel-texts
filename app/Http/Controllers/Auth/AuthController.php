<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Http\Requests\Auth\AuthenticateRequest;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class AuthController extends Controller
{
    public function login()
    {
        return view('auth.login');
    }

    public function authenticate(AuthenticateRequest $request)
    {
        $user = User::where('name', $request->input('login'))->first();

        if (! $user) {
            abort(400);
        }

        if (! Hash::check($request->input('password'), $user->password)) {
            abort(401);
        }

        Auth::login($user);

        return redirect()->route('songs.index')->with('success', 'Вход выполнен успешно');
    }
}
