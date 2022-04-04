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
        Schema::create('informacoes_users', function (Blueprint $table) {
            $table->id();
            $table->bigInteger('user_id')->unsigned()->unique();
            $table->bigInteger('nacionalidade_id')->unsigned();
            $table->bigInteger('provincia_id')->unsigned();
            $table->bigInteger('municipio_id')->unsigned();
            $table->enum('estado_civil',['CASADO','SOLTEIRO'])->default('SOLTEIRO');
            $table->string('bi',100)->unique();
            $table->string('seg_telefone',100)->default('NO');
            $table->string('seg_email',100)->default('NO');
            $table->timestamps();
            $table->foreign('user_id')->references('id')->on('users')->onDelete('cascade');
            $table->foreign('nacionalidade_id')->references('id')->on('nacionalidades')->onDelete('cascade');
            $table->foreign('provincia_id')->references('id')->on('provincias')->onDelete('cascade');
            $table->foreign('municipio_id')->references('id')->on('municipios')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('informacoes_users');
    }
};
