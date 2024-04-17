<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateVouchersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('vouchers', function (Blueprint $table) {
            $table->id();
            $table->string('code');
            $table->string('name');
            $table->string('desc_excerpt')->nullable();
            $table->text('desc')->nullable();
            $table->unsignedBigInteger('type_id');
            $table->unsignedBigInteger('uses')->nullable();
            $table->unsignedBigInteger('max_uses')->nullable();
            $table->unsignedBigInteger('max_uses_user')->nullable();
            $table->unsignedBigInteger('discount_nominal')->nullable();
            $table->unsignedBigInteger('discount_percentage')->nullable();
            $table->unsignedBigInteger('max_discount')->nullable()->comment('Maximal percentage discount');
            $table->unsignedBigInteger('minimum_order')->nullable();
            $table->dateTime('start_at');
            $table->dateTime('expired_at');
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
        Schema::dropIfExists('vouchers');
    }
}
