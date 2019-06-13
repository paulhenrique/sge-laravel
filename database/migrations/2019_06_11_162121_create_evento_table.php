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
            $table->string("Nome");
            $table->datetime("DataInicio");
            $table->datetime("DataFim");
            $table->datetime("DataLimiteInscricao");
            $table->string("ConteudoProgramatico");
            $table->string("Responsavel");
            $table->string("CargaHoraria");
            $table->time("HorarioInicio");
            $table->time("HorarioFim");
            $table->time("Local");
            $table->binary("Logo");
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
