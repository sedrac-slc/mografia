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
        Schema::create('projectos', function (Blueprint $table) {
            $table->id();
            $table->bigInteger('user_id')->unsigned();
            $table->bigInteger('tema_id')->unsigned();
            $table->string('nome',100);
            $table->enum('acesso',['PUBLICO','PRIVADO','PROTEGIDO'])->default('PUBLICO');
            $table->enum('tipo',['MONOGRAFIA','REDACAO','ESCOLAR','REVISTA'])->default('MONOGRAFIA');
            $table->date('data_inicio');
            $table->date('data_fim');
            $table->string('pro_descricao');
            $table->timestamps();
            $table->unique(['user_id','tema_id','nome']);
            $table->foreign('user_id')->references('id')->on('users')->onDelete('cascade');
            $table->foreign('tema_id')->references('id')->on('temas')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('projectos');
    }
};
