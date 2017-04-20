<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreatePhotoTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('photo', function(Blueprint $table) {
            $table->increments('ID_Photo');
            $table->boolean('Is_Deleted', 100);
            $table->date('Date', 100);
            $table->string('Url', 100);
            $table->integer('ID_Activite')->unsigned();
            $table->integer('ID_Type_Photo')->unsigned();
            $table->foreign('ID_Activite')->references('id')->on('activites');
            $table->foreign('ID_Type_Photo')->references('ID_Type_Photo')->on('type_photo');

        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop('photo');
    }
}
