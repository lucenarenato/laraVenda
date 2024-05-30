<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateAddressesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('addresses', function (Blueprint $table) {
            $table->id();
            $table->string('zipcode', 8)->nullable();
            $table->string('public_place', 100)->nullable();
            $table->string('address_number', 5)->nullable();
            $table->string('neighborhood', 50)->nullable();
            $table->string('city', 50)->nullable();
            $table->string('state', 2)->nullable();
            $table->unsignedBigInteger('owner_id');

            $table->timestamps();
            $table->softDeletes();

            $table->foreign('owner_id')->references('id')->on('users');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('addresses');
    }
}
