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
        Schema::create('users', function (Blueprint $table) {
            $table->id();
            $table->string('provider')->nullable();
            $table->string('provider_id')->nullable();
            $table->string('name',70);
            $table->string('nome_completo',100);
            $table->string('email',70)->unique();
            $table->timestamp('email_verified_at')->nullable();
            $table->string('password',255)->nullable();
            $table->string('telefone',30)->unique();
            $table->date('data_nascimento');
            $table->enum('genero',['MASCULINO','FEMENINO'])->default('MASCULINO');
            $table->enum('type',['SUPER','ADMIN','USER'])->default('USER');
            $table->rememberToken();
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
        Schema::dropIfExists('users');
    }
};
