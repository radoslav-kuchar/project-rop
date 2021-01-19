<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class LoginController extends Controller
{
    public function login(Request $request){
        $login = $request->validate([
            'email' => 'required|email',
            'password' => 'required',
        ]);

        if(!Auth::attempt($login)){
            return response(['message' => 'Neplatné prihlasovanie údaje.']);
        }

        $accessToken = Auth::user()->createToken('authToken')->accessToken;

        return response(['user' => Auth::user(), 'accessToken' => $accessToken]);
    }
}
