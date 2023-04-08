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
        Schema::table('users', function (Blueprint $table) {
            $table->unsignedBigInteger('country_id')->after('name')->nullable();
            $table->unsignedBigInteger('state_id')->after('country_id')->nullable();
            $table->unsignedBigInteger('city_id')->after('state_id')->nullable();
            $table->string('last_name')->nullable()->after('city_id');
            $table->string('postCode')->nullable()->after('last_name');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('users', function (Blueprint $table) {
            //
        });
    }
};
