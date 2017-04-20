<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateCommentaireTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('commentaire', function(Blueprint $table) {
            $table->increments('id');
            $table->boolean('Is_Deleted', 100);
            //$table->date('date', 100);
            $table->string('commentaire', 100);
            $table->integer('ID_User')->unsigned();
            $table->integer('ID_Activite')->unsigned();
            $table->foreign('ID_User')->references('id')->on('users');
            $table->foreign('ID_Activite')->references('id')->on('activites');
            //$table->foreign('ID_Photo')->references('ID_Photo')->on('photo');
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
        Schema::drop('commentaire');
    }
}
