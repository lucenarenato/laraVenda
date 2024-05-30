<?php

namespace App\Services;

use App\Models\User;

class UserService {
    public function create($userData) {
        $user = new User();
        $user->create($userData);
    }

    public function update($userData, $userID) {
        $user = User::find($userID);

        foreach ($userData as $key => $value) {
            if (!isset($value)) {
                unset($userData[$key]);
            }
        }

        $user->update($userData);
    }

    public function delete(User $user) {
        $user->delete();
    }
}
