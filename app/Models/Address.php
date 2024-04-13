<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Address extends Model
{
    use HasFactory;

    protected $fillable = [
        'zipcode',
        'public_place',
        'address_number',
        'neighborhood',
        'city',
        'state',
        'owner_id'
    ];
}
