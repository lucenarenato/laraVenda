<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ProductController extends Controller
{
    public function index() {
        return view('pages.admin.products.productsList');
    }

    public function create() {
        return view('pages.admin.products.addProduct');
    }
}
