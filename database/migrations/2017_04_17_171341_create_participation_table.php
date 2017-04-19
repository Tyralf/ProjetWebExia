<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateParticipationTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('participation', function(Blueprint $table) {
            $table->integer('ID_User')->unsigned();
            $table->integer('ID_Activite')->unsigned();
            $table->foreign('ID_User')->references('id')->on('users');
            $table->foreign('ID_Activite')->references('ID_Activite')->on('activite');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop('participation');
    }
}
