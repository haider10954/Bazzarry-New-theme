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
        return $this->hasOne(Billing_detail::class, 'id', 'billing_address');
    }

    public function getShippingAddress()
    {
        return $this->hasOne(Shipping_detail::class, 'id', 'shipping_address');
    }
    public function getUser()
    {
        return $this->hasOne(User::class, 'id', 'user_id');
    }

    public static function boot()
    {
        parent::boot();

        static::created(function ($model) {
            $order_cart_items = unserialize($model->cart_items);
            foreach ($order_cart_items as $key => $item) {
                $product = Product::find($key);
                $product->increment('sale_count', 1);
            }
        });
    }
}
