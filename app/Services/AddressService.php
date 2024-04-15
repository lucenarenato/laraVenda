<?php

namespace App\Services;

use App\Models\Address;

class AddressService {
    public function create($addressData) {
        $address = new Address();

        $address->save($addressData);
    }

    public function update(Address $address) {
        $address->update();
    }

    public function delete(Address $address) {
        $address->delete();
    }
}
