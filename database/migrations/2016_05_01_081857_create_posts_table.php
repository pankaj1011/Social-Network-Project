<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreatePostsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('posts', function (Blueprint $table) {
            $table->increments('id');
			$table->timestamps();
			$table->text('body');
			$table->integer('user_id')->unsigned()->nullable();
			 $table->foreign('user_id')->references('id')->on('users');
			 $table->integer('dog_id')->unsigned()->nullable();
			 $table->foreign('dog_id')->references('id')->on('dogs');

        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop('posts');
    }
}
