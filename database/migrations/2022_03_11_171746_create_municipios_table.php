<?php

use App\Models\Municipio;
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
        Schema::create('municipios', function (Blueprint $table) {
            $table->id();
            $table->bigInteger('provincia_id')->unsigned();
            $table->string('mun_descricao',100)->unique();
            $table->timestamps();
            $table->foreign('provincia_id')->references('id')->on('provincias')->onDelete('cascade');
        });

        if(Schema::hasTable('municipios')){
            $map = [[1,'Ambriz'],[1,'Bula Atumba'],[1,'Dande'],[1,'Dembos (Quibaxe)'],[1,'Nambuangongo'],[1,'Pango Aluquem'],[2,'Baía Farta '],[2,'Balombo'],[2,'Benguela'],[2,'Bocoio'],[2,'Caimbambo'],[2,'Catumbela'],[2,'Chongoroi'],[2,'Cubal'],[2,'Ganda'],[2,'Lobito'],[3,'Andulo'],[3,'Camacupa'],[3,'Catabola'],[3,'Chinguar'],[3,'Chitembo'],[3,'Cuemba'],[3,'Cuito'],[3,'Cunhinga'],[3,'Nharea'],[4,'Belize'],[4,'Buco-Zau'],[4,'Cabinda'],[4,'Cacongo'],[5,'Calai'],[5,'Cuangar'],[5,'Cuchi'],[5,'Cuito Cuanavale'],[5,'Dirico'],[5,'Mavinga'],[5,'Menongue'],[5,'Nancova'],[5,'Rivungo'],[6,'Ambaca'],[6,'Banga'],[6,'Bolongongo'],[6,'Cambambe'],[6,'Cazengo'],[6,'Golungo Alto'],[6,'Gonguembo'],[6,'Lucala'],[6,'Quiculungo'],[6,'Samba Cajú'],[7,'Amboim'],[7,'Cassongue'],[7,'Cela'],[7,'Conda'],[7,'Ebo'],[7,'Libolo'],[7,'Mussende'],[7,'Porto Amboim'],[7,'Quibala'],[7,'Quilenda'],[7,'Seles'],[7,'Sumbe'],[8,'Cahama'],[8,'Cuanhama'],[8,'Curoca'],[8,'Cuvelai'],[8,'Namacunde'],[8,'Ombadja'],[9,'Bailundo'],[9,'Caála'],[9,'Catchiungo (ex-Bela Vista)'],[9,'Chicala-Choloanga (ex-Vila Nova)'],[9,'Chinjenje'],[9,'Ecunha'],[9,'Huambo'],[9,'Londuimbale'],[9,'Longonjo'],[9,'Mungo'],[9,'Ucuma (ex-Cuma)'],[10,'Caconda'],[10,'Cacula'],[10,'Caluquembe'],[10,'Chibia'],[10,'Chicomba'],[10,'Chipindo'],[10,'Cuvango'],[10,'Gambos'],[10,'Humpata'],[10,'Jamba'],[10,'Lubango'],[10,'Matala'],[10,'Quilengues'],[10,'Quipungo'],[11,'Belas'],[11,'Cacuaco'],[11,'Cazenga'],[11,'Ícolo e Bengo'],[11,'Kilamba Kiaxi'],[11,'Luanda'],[11,'Quissama'],[11,'Talatona'],[11,'Viana'],[12,'Cambulo'],[12,'Capenda Camulemba'],[12,'Caungula'],[12,'Chitato'],[12,'Cuango'],[12,'Cuilo'],[12,'Lóvua'],[12,'Lubalo'],[12,'Lucapa'],[12,'Xá Muteba'],[13,'Cacolo'],[13,'Dala'],[13,'Muconda'],[13,'Saurimo'],[14,'Cacuso '],[14,'Cahombo'],[14,'Calandula'],[14,'Cambundi-Catembo'],[14,'Cangandala'],[14,'Kiwaba Nzoji'],[14,'Kunda-Dya-Base'],[14,'Luquembo'],[14,'Malanje'],[14,'Marimba'],[14,'Massango'],[14,'Mucari'],[14,'Quela'],[14,'Quirima'],[15,'Alto Zambeze'],[15,'Bundas'],[15,'Camanongue'],[15,'Léua'],[15,'Luacano'],[15,'Luau'],[15,'Luchazes'],[15,'Lumeje Cameia'],[15,'Moxico'],[16,'Bibala'],[16,'Camacuio'],[16,'Moçâmedes'],[16,'Tômbua'],[16,'Virei'],[17,'Alto Cauale'],[17,'Ambuila'],[17,'Bembe'],[17,'Buengas'],[17,'Bungo'],[17,'Damba'],[17,'Maquela do Zombo'],[17,'Milunga'],[17,'Mucaba'],[17,'Negage'],[17,'Puri'],[17,'Quimbele'],[17,'Quitexe'],[17,'Sanza Pombo'],[17,'Songo'],[17,'Uíge'],[18,'Cuimba'],[18,'M´Banza Kongo'],[18,'Noqui'],[18,'N´Zeto'],[18,'Soyo'],[18,'Tomboco']];
            foreach($map as $m)
                Municipio::create([
                    'provincia_id'=>$m[0],
                    'mun_descricao'=>$m[1]
                ]);

        }

    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('municipios');
    }
};
