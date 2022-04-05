<?php

use App\Models\Nacionalidade;
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
        Schema::create('nacionalidades', function (Blueprint $table) {
            $table->id();
            $table->string('nac_descricao',55)->unique();
            $table->timestamps();
        });

        if(Schema::hasTable('nacionalidades')){
            $list = ['Angolano','Afegão','Alemão','Americano','Antiguano','Árabe','Argelino','Argentino','Armênio','Australiano','Austríaco','Azeri','Bahamense','Bangladês','Barbadiano','Baremita','Bechuano','Belga','Belizenho','Beninense','Bielorrusso','Birmanês','Boliviano','Bósnio','Brasileira','Britânico','Bruneano','Búlgaro','Burquinense','Burundês','Butanense','Cabo-Verdiano','Camaronense','Cambojano','Canadense','Catarense','Cazaque','Centro-Africano','Chadiano','Chileno','Chinesa','Cipriota','Colombiano','Comoriano','Congolense','Cookiano','Coreano','Costa-Marfinense','Costa-Riquenho','Croata','Cubana','Dinamarquês','Djibutiense','Dominicano','Dominiquense','Egípcio','Equatoriano','Eritreu','Escocês','Eslovaco','Espanhol','Espanhola','Estoniano','Etiope','Fijiano','Filipino','Finlandês','Francês','Gabonense','Galês','Gambiano','Ganense','Geórgico','Granadino','Grego','Guatemalteco','Guianense','Guineano','Guineense','Guinéu-Equatoriano','Haitiano','Holandês','Hondurenho','Húngaro','Iemenita','Indiano','Indonésio','Inglês','Iraniano','Irlandês','Islandês','Israelita','Italiana','Jamaicano','Japonês','Jordão','Kuwaitiano','Laosiano','Lesotiano','Letoniano','Libanês','Liberiano','Líbio','Liechtensteinense','Lituano','Luxemburguês','Macedônio','Madagascarense','Malaio','Malauiano','Maldivo','Maliano','Maltês','Marroquino','Marshallino','Mauriciano','Mauritano','Mexicano','Micronésio','Moçambicano','Moldávio','Monegasco','Mongol','Montenegrino','Namibiano','Nauruano','Neozelandês','Nepalês','Nicaraguense','Nigeriano','Nigerino','Niuano','Norte-Coreano','Norueguês','Omanense','Palauense','Palestino','Panamenho','Papuásio','Paquistanês','Paraguaio','Peruano','Polonês','Portuguesa','Queniano','Quirguistanês','Quiribatiano','Romeno','Ruandês','Ruandesa','Russa','Russo','Salomônico','Salvadorenho','Samoano','Santa-Lucense','São-Cristovense','São-Marinense','São-Tomense','São-Vicentino','Seichelense','Senegalense','Serra-Leonês','Sérvio','Singapurense','Sírio','Somali','Srilankês','Suazi','Sudanense','Sueco','Suíço','Sul–Africano','Sul-Sudanense','Surinamês','Tailandês','Tajique','Tanzaniano','Tcheco','Timorense','Togolês','Tonganês','Trinitário','Tunisiano','Turco','Turcomeno','Tuvaluano','Ucraniana','Ucraniano','Ugandês','Uruguaio','Uzbeque','Vanuatuano','Venezuelano','Vietnamita','Z Andorrano','Zambiano','Zimbabueano'];
            foreach($list as $e)
                 Nacionalidade::create(['nac_descricao'=>$e]);
        }

    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('nacionalidades');
    }
};
