<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateLikeTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('like', function(Blueprint $table) {
            $table->increments('ID_Like');
            $table->string('Is_Deleted', 100);
            $table->integer('ID_User')->unsigned();
            $table->integer('ID_Photo')->unsigned();
            $table->foreign('ID_User')->references('id')->on('utilisateur');
            $table->foreign('ID_Photo')->references('ID_Photo')->on('photo');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop('like');
    }
}
