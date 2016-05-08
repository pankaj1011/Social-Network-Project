<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateDogsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('dogs', function (Blueprint $table) {
            $table->increments('id');
			$table->timestamps();
			$table->string('name');
			$table->string('path');
			$table->date('date_of_birth');
			$table->integer('breed_id')->unsigned()->nullable();
			$table->foreign('breed_id')->references('id')->on('breeds');
			$table->integer('user_id')->unsigned()->nullable();
			$table->foreign('user_id')->references('id')->on('users');

        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop('dogs');
    }
}
