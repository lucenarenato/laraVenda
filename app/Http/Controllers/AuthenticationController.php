<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class AuthenticationController extends Controller
{
    public function index() {
        return view('pages.guest.login');
    }

    public function register() {
        return view('pages.guest.register');
    }

    /**
     * @param Request $request
     */
    public function login(Request $request) {
        $credentials = $request->only('email', 'password');

        if (auth()->attempt($credentials)) {
            return redirect()->intended();
        }
    }

    public function logout() {
        auth()->logout();
        return redirect()->route('guest.login');
    }
}
