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
        Schema::create('titulos', function (Blueprint $table) {
            $table->id();
            $table->bigInteger('projecto_id')->unsigned();
            $table->bigInteger('user_id')->unsigned();
            $table->string('descricao',100);
            $table->unique(['projecto_id','descricao']);
            $table->integer('prioridade')->unsigned()->default(0);
            $table->timestamps();
            $table->foreign('projecto_id')->references('id')->on('projectos')->onDelete('cascade');
            $table->foreign('user_id')->references('id')->on('users')->onDelete('cascade');
        });

    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('titulos');
    }
};
