<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Address extends Model
{
    use HasFactory, SoftDeletes;

    protected $table = 'addresses';

    protected $fillable = [
        'zipcode',
        'public_place',
        'address_number',
        'neighborhood',
        'city',
        'state',
        'owner_id'
    ];

    public function owner() {
        return $this->belongsTo(User::class, 'owner_id', 'id');
    }
}
