<?php

use App\Http\Controllers\AdminController;
use App\Http\Controllers\AuthenticationController;
use App\Http\Controllers\InvoiceController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\UserController;
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

    Route::get('/', [AdminController::class, 'index'])->name('initial');

    Route::get('/meus-dados', [UserController::class, 'adminEdit'])->name('admin.edit');
    Route::put('/meus-dados', [UserController::class, 'update'])->name('user.update');

    Route::prefix('produtos')->name('product.')->group(function() {
        Route::get('listar', [ProductController::class, 'index'])->name('list');
        Route::get('adicionar', [ProductController::class, 'create'])->name('create');
    });

    Route::prefix('pedidos')->name('invoice.')->group(function() {
        Route::get('listar', [InvoiceController::class, 'index'])->name('list');
        Route::get('adicionar', [InvoiceController::class, 'create'])->name('create');
    });

    Route::prefix('usuarios')->name('user.')->group(function() {
        Route::get('listar', [UserController::class, 'index'])->name('list');
        Route::get('adicionar', [UserController::class, 'create'])->name('create');
    });
});
