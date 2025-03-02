<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Cookie;
use Illuminate\Support\Facades\Hash;

class AuthController extends Controller
{
    function login(Request $request) {
        $request->validate([
            'email' => 'required|string',
            'password' => 'required|string'
        ]);

        $user = User::where("email", "=", $request->email)->first();
        if ($user && Hash::check($request->password, $user->password)) {

            $token = $user->createToken('login')->accessToken;
            Cookie::queue('Authorization', $token, 43200);
            return redirect()->route('dashboard');

        }

        return redirect()->route('login')->with('error', 'It looks like some field is incorrect!');
    }
}
