<?php

use App\Models\ConteudoTipo;
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
        Schema::create('conteudo_tipos', function (Blueprint $table) {
            $table->id();
            $table->string('con_descricao')->unique();
            $table->timestamps();
        });

        if(Schema::hasTable('conteudo_tipos')){
            $list = ['GERAL','CONCEITO','HISTORIA','BIBLIOGRAFIA','PERCURSOR','IMPORTANCIA'];
            foreach($list as $e)
                ConteudoTipo::create(['con_descricao' =>$e]);
        }
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('conteudo_tipos');
    }
};
