<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Review extends Model
{
    use HasFactory;

    protected $guarded = [];

    public function getProduct()
    {
        return $this->hasOne(Product::class , 'id' , 'product_id');
    }
}
