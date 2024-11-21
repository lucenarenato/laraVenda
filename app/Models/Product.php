<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Product extends Model
{
    use HasFactory, SoftDeletes;

    protected $fillable = [
        'name',
        'cost_price',
        'sell_price',
        'sku',
        'description',
    ];

    public function tags() {
        return $this->belongsToMany(Tag::class, 'products_tags');
    }
}
