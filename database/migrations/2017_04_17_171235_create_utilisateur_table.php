<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateUtilisateurTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('utilisateur', function(Blueprint $table) {
            $table->increments('id');
            $table->string('Nom',100);
            $table->string('Prenom', 100);
            $table->string('Password', 100);
            $table->string('Email', 100);
            $table->integer('ID_Ecole')->unsigned();
            $table->integer('ID_Type_User')->unsigned();
            $table->foreign('ID_Ecole')->references('ID_Ecole')->on('ecole');
            $table->foreign('ID_Type_User')->references('ID_Type_User')->on('Type_User');
            $table->rememberToken();
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
        Schema::drop('utilisateur');
    }
}
