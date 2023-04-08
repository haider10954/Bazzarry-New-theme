<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ProductOffer extends Model
{
    use HasFactory;

    protected $guarded = [];

    public function getProduct()
    {
        return $this->hasOne(Product::class, 'id', 'product_id');
    }

    public function getCategory()
    {
        return $this->hasOne(Category::class, 'id', 'category_id');
    }
}
