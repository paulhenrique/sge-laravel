<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class ImagesEvento extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('imagesEvento', function (Blueprint $table) {
            $table->bigIncrements('idImagesEvento');
            $table->bigInteger('idEvento')->unsigned();
            $table->binary("Images");
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
        Schema::dropIfExists('imagesEvento');
    }
}
