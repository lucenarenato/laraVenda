<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class UserController extends Controller
{
    public function index() {
        return view('pages.admin.users.usersList');
    }

    public function create() {
        return view('pages.admin.users.addUser');
    }

    public function adminEdit() {
        return view('pages.admin.adminEdit');
    }
}
