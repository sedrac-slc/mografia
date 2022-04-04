<?php

namespace App\Http\Controllers;

use App\Http\Controllers\{
    ColaboracaoProjectosController
};
use App\Components\ListTipoProjecto;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;

class PainelController extends Controller
{
    private $tam = 5;

    public function pages($page){
        switch($page){
            case "projecto":
                $temas = DB::table('temas')->where('user_id',Auth::user()->id)->orderBy('id','DESC')->get();
                $projectos = DB::table('projectos')
                                ->join('temas','projectos.tema_id','=','temas.id')
                                ->where('projectos.user_id',Auth::user()->id)
                                ->select('projectos.*','tema_id','nome','temas.descricao')
                                ->orderBy('projectos.id','DESC')
                                ->paginate($this->tam);
                                dd($projectos->all());
                return view("fragments.painel.projecto",compact('temas','projectos','listTipo'));
            case "tema":
                $temas = DB::table('temas')->where('user_id',Auth::user()->id)
                                           ->orderBy('id','DESC')
                                           ->paginate(5);
                return view("fragments.painel.tema",compact('temas'));
            case "conta":
                $nacionalidades = DB::table('nacionalidades')->get();
                $provincias = DB::table('provincias')->get();
                return view("fragments.painel.conta",compact('nacionalidades','provincias'));
            case "colaborador":
                if(!$colaborador = DB::table('colaboradors')->where('user_id',Auth::user()->id)->first())
                    return view("fragments.painel.colaborador");
                $projectosColaboracao = ColaboracaoProjectosController::queryDefault($colaborador);
                return view("fragments.painel.colaborador",compact('colaborador','projectosColaboracao'));
            case "indece":
                $projectos = DB::table('projectos')
                    ->join('temas','temas.id','=','tema_id')
                    ->where('projectos.user_id',Auth::user()->id)
                    ->select('temas.descricao','projectos.nome','projectos.id')
                    ->get();
               // dd($projectos);
                return view("fragments.painel.indece",compact('projectos'));
            default:
                return view("dashboard");
        }
        return view("dashboard");
    }

}
