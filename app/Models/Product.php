<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    use HasFactory;
    protected $fillable = [ 'category_id', 'name', 'price', 'description', 'offer', 'image'];
    protected $table = 'products';
		

    public  function category(){
        return $this->belongsTo(Category::class, 'category_id');
    }

    public function colors(){
        return $this->hasMany(ColorProduct::class, 'product_id');
    }

    public function images(){
        return $this->hasMany(ImageProduct::class, 'product_id');
    }
}
