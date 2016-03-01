<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class PostsTranslation extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('post_translation', function(Blueprint $table)
        {
            $table->increments('id');
            $table->integer('post_id')->unsigned();

            $table->string('locale')->index();

            $table->string('title');
            $table->text('body');

            $table->unique(['post_id', 'locale']);

            $table->foreign('post_id')
                ->references('id')
                ->on('posts')
                ->onDelete('CASCADE');

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
        Schema::drop('post_translation');
    }
}
