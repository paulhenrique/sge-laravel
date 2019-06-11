<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateUserAtividadeTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('user_atividade', function (Blueprint $table) {
            $table->bigIncrements('idUserAtividade');
            $table->bigInteger('idUser')->unsigned();
            $table->foreign('iduser')->references('id')->on('users');
            $table->bigInteger('idAtividade')->unsigned();
            $table->foreign('idAtividade')->references('idAtividade')->on('atividade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('user_atividade');
    }
}
