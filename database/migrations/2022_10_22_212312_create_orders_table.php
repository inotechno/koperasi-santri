<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateOrdersTable extends Migration
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
            $table->string('order_number')->unique();
            $table->string('reference_number');
            $table->foreignId('store_id')->onUpdate('cascade')->onDelete('cascade');
            $table->foreignId('user_id')->onUpdate('cascade')->onDelete('cascade');
            $table->unsignedBigInteger('ppn');
            $table->unsignedBigInteger('disc')->nullable();
            $table->unsignedBigInteger('grand_total');
            $table->bigInteger('voucher_id')->nullable();
            $table->foreignId('payment_detail_id')->constrained()->cascadeOnDelete()->cascadeOnUpdate();
            $table->foreignId('delivery_detail_id')->constrained()->cascadeOnDelete()->cascadeOnUpdate();
            $table->timestamp('cancel_time')->nullable();
            $table->timestamp('process_time')->nullable();
            $table->timestamp('shipping_time')->nullable();
            $table->timestamp('accepted_time')->nullable();
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
}
