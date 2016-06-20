<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateGiftsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('gifts', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('from')->unsigned();
            $table->integer('to')->unsigned();
            $table->integer('present')->unsigned();
            $table->foreign('from')->references('id')->on('users')->onDelete("CASCADE");
            $table->foreign('to')->references('id')->on('users')->onDelete("CASCADE");
            $table->foreign('present')->references('id')->on('presents')->onDelete("CASCADE");
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
        Schema::drop('gifts');
    }
}
