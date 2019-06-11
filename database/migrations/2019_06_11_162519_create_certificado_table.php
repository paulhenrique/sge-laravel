<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateCertificadoTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('certificado', function (Blueprint $table) {
            $table->bigIncrements('idEvento');
            $table->date("DataGeracao");
            $table->string("ResponsavelEmissao");
            $table->date("Organizador");
            $table->bigInteger('idEvento')->unsigned();
            $table->foreign('idEvento')->references('idEvento')->on('evento');
            $table->bigInteger('idUser')->unsigned();
            $table->foreign('idUser')->references('id')->on('users');
            $table->bigInteger('idAtividade')->unsigned();
            $table->foreign('idAtividade')->references('idAtividade')->on('atividade');
            $table->time("CargaHoraria");
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('certificado');
    }
}
