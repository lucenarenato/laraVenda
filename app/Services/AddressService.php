<?php

namespace App\Services;

use App\Models\Address;

class AddressService {
    public function create($addressData) {
        $address = new Address();

        $address->create($addressData);
    }

    public function update($addressData, $userID) {
        $address = Address::where('owner_id', $userID)->first();

        if (!$address) {
            $addressData['owner_id'] = $userID;

            $this->create($addressData);
            return;
        }

        $address->update($addressData);
    }

    public function delete(Address $address) {
        $address->delete();
    }
}
