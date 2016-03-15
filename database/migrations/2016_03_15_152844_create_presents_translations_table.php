<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreatePresentsTranslationsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('presents_translations', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('present_id')->unsigned();
            $table->string('locale');
            $table->string('name');
            $table->timestamps();

            $table->foreign('present_id')->references('id')->on('presents')->onDelete('CASCADE');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop('presents_translations');
    }
}
