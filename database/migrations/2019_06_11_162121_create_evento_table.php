<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateEventoTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('evento', function (Blueprint $table) {
            $table->bigIncrements('idEvento');
            $table->bigInteger("idTemplate")->unsigned();
            $table->string("CondicaoEvento");
            $table->string("CondicaoCadastroDeAtividade");
            $table->string("Nome");
            $table->string("Apelido");
            $table->datetime("DataInicio");
            $table->datetime("DataFim");
            $table->datetime("DataLimiteInscricao");
            $table->string("ConteudoProgramatico");
            $table->string("Responsavel");
            $table->string("CargaHoraria");
            $table->time("HorarioInicio");
            $table->time("HorarioFim");
            $table->string("Local");
            $table->binary("Logo");
            $table->string("Site")->nullable();
            $table->foreign('idTemplate')->references('idTemplate')->on('template_evento');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('evento');
    }
}
