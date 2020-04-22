<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateAtividadeTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('atividade', function (Blueprint $table) {
            $table->bigIncrements('idAtividade');
            $table->string("CondicaoAtividade");
            $table->string("nomeAtividade");
            $table->string("tipo");
            $table->dateTime("DataInicio");
            $table->dateTime("DataTermino");
            $table->time("HoraInicio");
            $table->time("HoraTermino");
            $table->integer("NumMaxParticipantes");
            $table->string("local");
            $table->string("Descricao");
            $table->bigInteger('idPalestrante')->unsigned();
            $table->bigInteger('idEvento')->unsigned();
            $table->foreign('idPalestrante')->references('id')->on('users');
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
        Schema::dropIfExists('atividade');
    }
}
