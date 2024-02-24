<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    use HasFactory;

    //add fillable
    protected $fillable = [
        'name',
        'slug',
        'price',
        'stock',
        'category_id',
        'description',
        'active'
    ];

    //add category relationship
    public function category()
    {
        return $this->belongsTo(Category::class);
    }

    //add product image relationship
    public function images()
    {
        return $this->hasMany(ProductImage::class);
    }
}
