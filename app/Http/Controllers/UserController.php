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
        return view('pages.admin.users.usersList');
    }

    public function create() {
        return view('pages.admin.users.addUser');
    }

    public function adminEdit() {
        return view('pages.admin.adminEdit');
    }

    public function userEdit() {
        //return view('pages.admin.adminEdit');
    }

    public function store(Request $request) {

    }

    public function update(Request $request, UserService $userService, AddressService $addressService, $user = null) {
        $userData = $request->only($this->userFields);
        $addressData = $request->except([...$this->userFields, '_token', '_method']);

        if (!$user) {
            $user = auth()->user()->id;
        }

        $userService->update($userData, $user);
        $addressService->update($addressData, $user);

        return redirect()->route('admin.edit');
    }
}
