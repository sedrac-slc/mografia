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
        Schema::create('paragrafo_titulos', function (Blueprint $table) {
            $table->id();
            $table->bigInteger('user_id')->unsigned();
            $table->bigInteger('titulo_id')->unsigned();
            $table->string('nome',100)->default('NO_CONTEUDO');
            $table->enum('conteudo',['CONCEITO','HISTORIA','BIBLIOGRAFIA','PERCURSOR','GERAL','IMPORTANCIA'])->default('GERAL');
            $table->longText('descricao');
            $table->integer('prioridade')->unsigned()->default(0);
            $table->timestamps();
            $table->foreign('user_id')->references('id')->on('users')->onDelete('cascade');
            $table->foreign('titulo_id')->references('id')->on('titulos')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('paragrafo_titulos');
    }
};
