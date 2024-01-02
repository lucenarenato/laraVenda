<?php

use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

// No Authenticated
Route::middleware('guest')->group(function() {
    Route::get('/login', function() {
        return view('pages.guest.login');
    })->name('login');

    Route::get('/registro', function() {
        return view('pages.guest.register');
    })->name('register');
});


// Authenticated
Route::middleware('auth')->get('/', function () {
    return view('pages.index');
});
