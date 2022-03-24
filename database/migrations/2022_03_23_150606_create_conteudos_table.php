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
        Schema::create('conteudos', function (Blueprint $table) {
            $table->id();
            $table->bigInteger('chave')->unsigned();
            $table->string('nome',100)->default('NO_CONTEUDO');
            $table->enum('tipo',['TITULO','SUBTITULO'])->default('SUBTITULO');
            $table->enum('conteudo',['CONCEITO','HISTORIA','BIBLIOGRAFIA','PERCURSOR','GERAL'])->default('GERAL');
            $table->longText('descricao');
            $table->integer('prioridade')->unsigned()->default(0);
            $table->unique(['chave','tipo','descricao']);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('conteudos');
    }
};
