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
        Schema::create('photos', function(Blueprint $table) {
            $table->increments('ID_Photo');
            $table->boolean('Is_Deleted', 100);
            $table->string('Url', 100);
            $table->integer('ID_Activite')->unsigned();
            $table->foreign('ID_Activite')->references('id')->on('activites');
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
        Schema::drop('photos');
    }
}
