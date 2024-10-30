<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class InvoiceController extends Controller
{
    public function index() {
        if (auth()->user()->hasRole('Admin')) {
            return view('pages.admin.invoices.index');
        }
    }
}
