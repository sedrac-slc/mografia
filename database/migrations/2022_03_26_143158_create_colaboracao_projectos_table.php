<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('colaboracao_projectos', function (Blueprint $table) {
            $table->id();
            $table->bigInteger('projecto_id')->unsigned();
            $table->bigInteger('colaborador_id')->unsigned();
            $table->timestamps();
            $table->unique(['projecto_id','colaborador_id']);
            $table->foreign('projecto_id')->references('id')->on('projectos')->onDelete('cascade');
            $table->foreign('colaborador_id')->references('id')->on('colaboradors')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('colaboracao_projectos');
    }
};
