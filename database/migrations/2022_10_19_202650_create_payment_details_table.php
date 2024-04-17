<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePaymentDetailsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('payment_details', function (Blueprint $table) {
            $table->id();
            $table->string('payment_code')->nullable();
            $table->string('payment_name')->nullable();
            $table->string('va_number')->nullable();
            $table->text('payment_url')->nullable();
            $table->text('qr_string')->nullable();
            $table->integer('status_code')->default(201)->comment('200 (Success Balance), 201 (Pending Balance), 202 (Cancel Balance), 203 (Expired Balance)');
            $table->unsignedBigInteger('fee');
            $table->dateTimeTz('expiration_date')->nullable();
            $table->dateTimeTz('paid_date')->nullable();
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
        Schema::dropIfExists('payment_details');
    }
}
