<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Shoppingcart extends Model
{
    use HasFactory;
    protected $fillable = [
        'user_id',
        'product_id',
        'color_id',
        'price',
        'offer',
    ];

    protected $dates = [
        'created_at',
        'updated_at',   
    ];

    protected $table = 'wishlists';
}
