<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ProductsTags extends Model
{
    use HasFactory;

    protected $table = 'products_tags';
    public $timestamps = false;

    protected $fillable = [
        'product_id',
        'tag_id'
    ];
}
