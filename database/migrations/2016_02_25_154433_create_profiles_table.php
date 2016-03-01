<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateProfilesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('profiles', function (Blueprint $table) {
            $table->integer('user_id');

            $table->foreign('user_id')
                ->references('id')
                ->on('users');

            $table->enum('gender', ['male', 'female']);
            $table->integer('height');
            $table->integer('weight');
            $table->enum('eye', ['Amber', 'Blue', 'Brown', 'Brown', 'Gray', 'Green', 'Hazel']);
            $table->enum('heir', ['Blonde' ]);

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
        Schema::drop('profiles');
    }
}
