<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('products', function (Blueprint $table) {
            $table->id();
            $table->foreignId('category_id')->constrained('categories')->cascadeOnDelete();
            $table->string('title');
            $table->unsignedBigInteger('added_id');
            $table->text('description');
            $table->text('images');
            $table->float('price');
            $table->text('thumbnail');
            $table->integer('quantity');
            $table->string('sku');
            $table->string('manufacturer_name')->nullable();
            $table->string('brand')->nullable();
            $table->string('discount')->nullable();
            $table->text('product_tags')->nullable()->default(null);
            $table->boolean('status')->default(0);
            $table->boolean('visibility')->default(1);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('products');
    }
};
