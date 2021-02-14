<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateFactureTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('facture', function (Blueprint $table) {
            $table->id();
            $table->string('title')->default("0");
            $table->integer('price')->default(0);
            $table->integer('choose')->default(0);
            $table->integer('price_t')->default(0);
            $table->integer('price_f')->default(0);
            $table->integer('number_facture')->default(0);
            $table->timestamps();
        });
        
        Schema::table('facture', function (Blueprint $table) {
            $table->unsignedBigInteger('user_id');

            $table->foreign('user_id')->references('id')->on('user');

            $table->unsignedBigInteger('basket_id');

            $table->foreign('basket_id')->references('id')->on('basket');

        });
    
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('facture');
    }
}
