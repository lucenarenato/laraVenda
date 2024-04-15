<?php

namespace App\Services;

use App\Models\User;

class UserService {
    public function create($userData) {
        $user = new User();

        $user->create($userData);
    }

    public function update(User $user) {
        $user->update();
    }

    public function delete(User $user) {
        $user->delete();
    }
}
