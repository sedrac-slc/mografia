<?php

namespace App\Http\Controllers;

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
                $temas = DB::table('temas')->where('user_id',Auth::user()->id)->get();
                $projectos = DB::table('projectos')
                                ->join('temas','projectos.tema_id','=','temas.id')
                                ->select('projectos.*','tema_id','nome','temas.descricao')
                                ->orderBy('projectos.id','DESC')
                                ->paginate($this->tam);
                $listTipo= ListTipoProjecto::all();
                return view("fragments.painel.projecto",compact('temas','projectos','listTipo'));
            case "tema":
                $temas = DB::table('temas')->where('user_id',Auth::user()->id)
                                           ->orderBy('id','DESC')
                                           ->paginate(5);
                return view("fragments.painel.tema",compact('temas'));
            default:
                return view("dashboard");
        }
        return view("dashboard");
    }

}
