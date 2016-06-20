<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateSmilesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('smiles', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('from')->unsigned();
            $table->foreign('from')->references('id')->on('users')->onDelete("CASCADE");
            $table->integer('to')->unsigned();
            $table->foreign('to')->references('id')->on('users')->onDelete("CASCADE");
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
        Schema::drop('smiles');
    }
}
