<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    use HasFactory;
    public $casts = [
        'cart_items' => 'array'
    ];
    protected $guarded = [];

    public function getBillingAddress()
    {
        return $this->hasOne(Billing_detail::class , 'id' , 'billing_address');
    }

    public function getShippingAddress()
    {
        return $this->hasOne(Shipping_detail::class , 'id' , 'shipping_address');
    }
    public function getUser()
    {
        return $this->hasOne(User::class , 'id' , 'user_id');
    }
}
