<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\User;

class AuthController extends Controller
{
    public function login (Request $request)
    {
        $credentials = $request->validate([
            'name' => 'required',
            'birthdate' => 'required|date',
        ]);

        $user = User::where('name', $credentials['name'])
                    ->where('birthdate', $credentials['birthdate'])
                    ->first();

        if ($user) {
            Auth::login($user);
            return redirect('/dashboard');
        }

        return back()->withErrors([
            'name' => 'The provided credentials do not match our records.',
        ]);
    }

    public function logout(Request $request)
    {
        Auth::logout();
        return redirect('/');
    }
}
