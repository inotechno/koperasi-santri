<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateProductsTable extends Migration
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
            $table->foreignId('store_id')->onUpdate('cascade')->onDelete('cascade');
            $table->foreignId('product_sub_category_id');

            $table->string('title');
            $table->string('slug')->unique();
            $table->decimal('price', 9, 0);
            $table->decimal('discount', 9, 0)->nullable();
            $table->integer('stock');
            $table->integer('minimum_order')->default(1);
            $table->string('condition')->default('baru');
            $table->string('image1')->nullable();
            $table->string('image2')->nullable();
            $table->string('image3')->nullable();
            $table->string('image4')->nullable();
            $table->string('image5')->nullable();
            $table->string('url_video')->nullable();
            $table->longText('description');
            $table->integer('weight');
            $table->integer('long')->nullable();
            $table->integer('width')->nullable();
            $table->integer('tall')->nullable();
            $table->integer('process_time')->default(3);
            $table->string('status_product')->default('publish');

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
}
