<?php

namespace App\Http\Controllers;

use App\Http\Requests\LoginRequest;
use Illuminate\Http\Request;
use Illuminate\Support\MessageBag;

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
    public function login(LoginRequest $request) {
        $credentials = $request->only('email', 'password');

        if (auth()->attempt($credentials)) {
            return redirect()->intended();
        }

        $customErrors = new MessageBag();
        $customErrors->add('wrong', 'Email e/ou senha incorreto(s)');

        return redirect()->route('guest.login')
            ->withErrors($customErrors)
            ->withInput();
    }

    public function logout() {
        auth()->logout();
        return redirect()->route('guest.index');
    }
}
