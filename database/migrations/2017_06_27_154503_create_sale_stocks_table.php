<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateSaleStocksTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('sale_stocks', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('user_id')->unsigned();
            $table->foreign('user_id')->references('id')->on('users')->onDelete('cascade');
            $table->integer('smallstock_id')->unsigned();
            $table->foreign('smallstock_id')->references('id')->on('small_stocks')->onDelete('cascade');  
            $table->string('size');
            $table->string('cartons');         
            $table->string('piece_per_cartons');
            $table->string('total');
            $table->string('origin');
            $table->string('approved_by');
            $table->string('comment');
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
        Schema::dropIfExists('sale_stocks');
    }
}
