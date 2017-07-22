<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateSmallStocksTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('small_stocks', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('user_id')->unsigned();
            $table->foreign('user_id')->references('id')->on('users')->onDelete('cascade');
            $table->integer('bigstock_id')->unsigned();
            $table->foreign('bigstock_id')->references('id')->on('big_stocks')->onDelete('cascade'); 
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
        Schema::dropIfExists('small_stocks');
    }
}
