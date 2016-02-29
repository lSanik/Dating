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
        Schema::create('profile', function(Blueprint $table){

            $table->integer('user_id')->unsigned();

            $table->foreign('user_id')->references('id')->on('users');

            $table->date('birthday');
            $table->integer('height');
            $table->integer('weight');
            $table->enum('eye', ['Amber', 'Blue', 'Brown', 'Gray', 'Green', 'Hazel']);

            $table->enum('hair', ['Black hair',
                'Natural black hair',
                'Deepest brunette hair',
                'Dark brown hair',
                'Medium brown hair',
                'Lightest brown hair',
                'Natural brown hair',
                'Light brown hair',
                'Chestnut brown hair',
                'Light chestnut brown hair',
                'Auburn brown hair',
                'Auburn hair',
                'Copper hair',
                'Red hair',
                'Titian hair',
                'Strawberry blond hair',
                'Light blonde hair',
                'Dark blond hair',
                'Golden blond hair',
                'Medium blond hair',
                'Grey hair',
                'White hair',
                'White hair caused by albinism']);

            $table->enum('education', ['School','Bachelor', 'Master', 'Ph.D']);
            $table->enum('kids', ['yes', 'no']);
            $table->enum('want_kids', ['yes','no']);

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
        Schema::drop('profile');
    }
}
