<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Variant extends Model
{
    use HasFactory;

    protected $guarded = [];

    public function values()
    {
        return $this->hasMany(VariantValue::class,'variant_id');
    }

    public function getCategory()
    {
        return $this->hasOne(Category::class, 'id' , 'category_id');
        
    }

}
