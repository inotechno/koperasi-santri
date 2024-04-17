<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateDeliveryDetailsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('delivery_details', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('address_to');
            $table->unsignedBigInteger('address_from');
            $table->foreign('address_to')->references('id')->on('user_addresses')->cascadeOnUpdate()->cascadeOnDelete();
            $table->foreign('address_from')->references('id')->on('user_addresses')->cascadeOnUpdate()->cascadeOnDelete();
            $table->string('expedition')->nullable();
            $table->string('expedition_service')->nullable();
            $table->string('resi_number')->nullable();
            $table->integer('total_weight');
            $table->unsignedBigInteger('shipping_cost');
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
        Schema::dropIfExists('delivery_details');
    }
}
