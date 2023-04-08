<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('orders', function (Blueprint $table) {
            $table->id();
            $table->string('order_id');
            $table->foreignId('user_id')->constrained('users');
            $table->foreignId('billing_address')->constrained('billing_details');
            $table->foreignId('shipping_address')->constrained('shipping_details');
            $table->boolean('status')->default(0);
            $table->double('total');
            $table->text('cart_items');
            $table->string('payment_method');
            $table->string('shipping_method');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('orders');
    }
};
