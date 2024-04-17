<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateHistoryWithdrawsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('history_withdraws', function (Blueprint $table) {
            $table->id();
            $table->string('reference_number', 20);
            $table->foreignId('user_id')->cascadeOnUpdate();
            $table->unsignedBigInteger('nominal');
            $table->string('status_code')->comment('200 success, 201 failed')->nullable();
            $table->string('status_description')->nullable();
            $table->foreignId('validation_by')->nullable();
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
        Schema::dropIfExists('history_withdraws');
    }
}
