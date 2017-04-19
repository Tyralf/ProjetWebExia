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
            $table->increments('ID_Commentaire');
            $table->boolean('Is_Deleted', 100);
            $table->date('Date', 100);
            $table->string('Commentaire', 100);
            $table->integer('ID_User')->unsigned();
            $table->integer('ID_Photo')->unsigned();
            $table->foreign('ID_User')->references('id')->on('users');
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
        Schema::drop('commentaire');
    }
}
