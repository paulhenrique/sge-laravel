<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTrabalhoTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('trabalho', function (Blueprint $table) {
            $table->bigIncrements('idTrabalho');
            $table->bigInteger("idEvento")->unsigned();
            $table->bigInteger("idUser")->unsigned();
            $table->string("autor");
            $table->string("coautores")->nullable();
            $table->string("nome");
            $table->string("linkVid")->nullable();
            $table->binary("trabalhoPdf");
            $table->binary("diarioPdf")->nullable();
            $table->foreign('idEvento')->references('idEvento')->on('evento');
            $table->foreign('idUser')->references('id')->on('users');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('trabalho');
    }
}
