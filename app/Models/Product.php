<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    use HasFactory;

    protected $casts = [
        'images' => 'array',
    ];

    protected $guarded = [];

    public function getCategory()
    {
        return $this->hasOne(Category::class , 'id' , 'category_id');
    }
}
