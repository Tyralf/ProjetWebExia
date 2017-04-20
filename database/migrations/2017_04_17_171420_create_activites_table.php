<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateActivitesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('activites', function(Blueprint $table) {
            $table->increments('id');
            $table->integer('ID_Author')->unsigned();
            $table->foreign('ID_Author')->references('id')->on('users');
            $table->string('titre', 100);
            $table->string('body', 255);
            $table->boolean('Is_Deleted', 100);
            $table->string('slug', 255);
            //$table->date('Date', 100);
            //$table->string('Adresse', 100);
            $table->integer('ID_Type_Activite')->unsigned();
            $table->foreign('ID_Type_Activite')->references('ID_Type_Activite')->on('type_activite');
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
        Schema::drop('activites');
    }
}
