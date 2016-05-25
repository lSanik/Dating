<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

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
            $table->string('locale')->index();
            $table->string('title');
            $table->text('description')->nullable();
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
