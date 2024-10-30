<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ProductController extends Controller
{
    public function index() {
        if ($user->hasRole('Admin')) {
            return view('pages.admin.products.index');
        }
    }

    public function create() {
        if ($user->hasRole('Admin')) {
            return view('pages.admin.products.new');
        }
    }
}
