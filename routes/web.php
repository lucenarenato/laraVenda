<?php

use App\Http\Controllers\AuthenticationController;
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
Route::middleware('guest')->name('guest.')->group(function() {
    Route::get('/login', [AuthenticationController::class, 'index'])->name('index');
    Route::get('/registrar', [AuthenticationController::class, 'register'])->name('register');
    Route::post('/login', [AuthenticationController::class, 'login'])->name('login');
});

// Authenticated
Route::middleware('auth')->group(function() {
    Route::get('/logout', [AuthenticationController::class, 'logout'])->name('logout');

    Route::get('/', function () {
        return view('pages.index');
    })->name('initial');
});
