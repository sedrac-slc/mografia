<?php

use App\Models\Provincia;
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
        Schema::create('provincias', function (Blueprint $table) {
            $table->id();
            $table->string('prov_descricao',70)->unique();
            $table->timestamps();
        });

        if(Schema::hasTable('provincias')){
            $list = ['Bengo','Benguela','Bíe','Cabinda','Cuando Cubango','Cuanza Norte','Cuanza Sul','Cunene','Huambo','Huila','Luanda','Lunda-Norte','Lunda-Sul','Malange','Moxico','Namibe','Uíge','Zaire'];
            foreach($list as $e)
                Provincia::create([ 'prov_descricao' => $e ]);
        }
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('provincias');
    }
};
