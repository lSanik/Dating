<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateProfilesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('profile', function (Blueprint $table) {
            $table->integer('user_id')->unsigned();

            $table->foreign('user_id')->references('id')->on('users');

            $table->enum('gender', ['male', 'female']); // пол

            $table->date('birthday'); // дата рождения

            $table->float('height'); //рос
            $table->float('weight'); //вес

            $table->enum('eye', ['Amber', 'Blue', 'Brown', 'Gray', 'Green', 'Hazel']); //цвет глаз

            $table->enum('hair', ['Black hair', 'Natural black hair', 'Deepest brunette hair', 'Dark brown hair',
                'Medium brown hair', 'Lightest brown hair', 'Natural brown hair', 'Light brown hair', 'Chestnut brown hair',
                'Light chestnut brown hair', 'Auburn brown hair', 'Auburn hair', 'Copper hair', 'Red hair', 'Titian hair',
                'Strawberry blond hair', 'Light blonde hair', 'Dark blond hair', 'Golden blond hair', 'Medium blond hair',
                'Grey hair', 'White hair', 'White hair caused by albinism', ]); // цвет волос

            $table->enum('education', ['School', 'Bachelor', 'Master', 'Ph.D']); //образование
            $table->enum('kids', ['yes', 'no']); // дети
            $table->enum('want_kids', ['yes', 'no']); //завести детей

            $table->enum('family', ['yes', 'no', 'look']); // семейное положение
            $table->enum('religion', ['Christianity', 'Gnosticism', 'Islam', 'Judaism', 'Catholicism', 'Buddhism', 'Hinduism', 'Shinto', 'Taoism']); //религия

            $table->enum('smoke', ['yes', 'no', 'times']); //курение
            $table->enum('drink', ['yes', 'no', 'times']); //выпивка

            $table->string('occupation');

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
