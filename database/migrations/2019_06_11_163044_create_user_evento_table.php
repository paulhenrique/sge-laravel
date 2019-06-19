<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateUserEventoTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('user_evento', function (Blueprint $table) {
            $table->bigIncrements('iduserEvento');
            $table->bigInteger('idUser')->unsigned();
            $table->foreign('iduser')->references('id')->on('users');
            $table->bigInteger('idEvento')->unsigned();
            $table->foreign('idEvento')->references('idEvento')->on('evento');
            
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('user_evento');
    }
}
