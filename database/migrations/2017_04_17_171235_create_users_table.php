<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateUsersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('users', function(Blueprint $table) {
            $table->increments('id');
            $table->string('name',100);
            $table->string('prenom', 100);
            $table->string('password', 100);
            $table->string('email', 100)->unique();
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
        Schema::drop('users');
    }
}
