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
        Schema::create('orders', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('user_id');
            $table->foreign('user_id')->references('id')->on('users');
            $table->boolean('delivery_address_same_as_client_address')->default(true);
            $table->string('address_street')->nullable();
            $table->string('address_housenumber')->nullable();
            $table->string('address_postalcode')->nullable();
            $table->string('address_city')->nullable();

            $table->unsignedBigInteger('mug_id');
            $table->foreign('mug_id')->references('id')->on('mugs');
            $table->string('img_url');
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
        Schema::dropIfExists('orders');
    }
};
