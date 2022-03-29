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
        Schema::create('subtitulos', function (Blueprint $table) {
            $table->id();
            $table->bigInteger('titulo_id')->unsigned();
            $table->string('sub_descricao',100);
            $table->unique(['titulo_id','sub_descricao']);
            $table->integer('prioridade')->unsigned()->default(0);
            $table->foreign('titulo_id')->references('id')->on('titulos')->onDelete('cascade');
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
        Schema::dropIfExists('subtitulos');
    }
};
