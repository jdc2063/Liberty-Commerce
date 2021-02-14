<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateProductTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('product', function (Blueprint $table) {
            $table->id();
            $table->string('title');
            $table->string('description');
            $table->integer('price');
            $table->integer('stock');
            $table->integer('choose')->default(0);
            $table->timestamps();
        });
        Schema::table('product', function (Blueprint $table) {
            $table->unsignedBigInteger('basket_id')->default(0);
            $table->foreign('basket_id')->references('id')->on('basket');

            $table->unsignedBigInteger('product_list_id')->default(0);
            $table->foreign('product_list_id')->references('id')->on('product_list');

            $table->unsignedBigInteger('facture_id')->default(0);
            $table->foreign('facture_id')->references('id')->on('facture');
        });

    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('product');
    }
}
