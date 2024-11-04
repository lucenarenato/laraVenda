<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Services\AddressService;
use App\Services\UserService;
use Illuminate\Http\Request;

class UserController extends Controller
{
    private $userFields = [
        'name',
        'email',
        'password',
        'confirm_password'
    ];

    public function index() {
        if (auth()->user()->hasRole('Admin')) {
            return view('pages.admin.index');
        }
    }

    public function userList() {
        if (auth()->user()->hasRole('Admin')) {
            return view('pages.admin.users.index');
        }
    }

    public function create() {
        if (auth()->user()->hasRole('Admin')) {
            return view('pages.admin.users.new');
        }
    }

    public function edit(User $user = null) {
        if (auth()->user()->hasRole('Admin')) {
            $route = $user ? 'pages.admin.users.edit' : 'pages.admin.edit';
            return view($route);
        }
    }

    public function store(Request $request) {

    }

    public function update(Request $request, UserService $userService, AddressService $addressService, $user = null) {
        $userData = $request->only($this->userFields);
        $addressData = $request->except([...$this->userFields, '_token', '_method']);

        $isMyInfoUpdate = false;

        if (!$user) {
            $user = auth()->user()->id;
            $isMyInfoUpdate = true;
        }

        $userService->update($userData, $user);
        $addressService->update($addressData, $user);

        $routeName = $isMyInfoUpdate ? "me" : "user";
        $routeName .= ".edit";

        return redirect()->route($routeName);
    }
}
