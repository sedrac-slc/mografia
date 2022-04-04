<?php

namespace App\Http\Controllers;

use App\Models\{
    Colaborador, Projecto, User, ColaboracaoProjectos
};
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;

class ColaboracaoProjectosController extends Controller
{

    public static function queryDefault($colaborador){
      return  DB::table('colaboracao_projectos')
                                //->join('colaboradors','colaboradors.id','=','colaborador_id')
                                ->join('projectos','projectos.id','=','projecto_id')
                                ->join('temas','temas.id','=','projectos.tema_id')
                                ->join('users','users.id','=','projectos.user_id')
                                ->where('colaborador_id',$colaborador->id)
                                ->select('projectos.nome','users.name','projectos.orcamento',
                                         'temas.descricao','colaboracao_projectos.projecto_id',
                                         'colaboracao_projectos.id')
                                ->get();
    }

    public function colaborar($id){
        if($projecto = Projecto::find($id))
            return view("fragments.painel.colaborador.freelanchers",compact('projecto'));
        return view("dashboard");
    }

    public function rollback($message,$descricao,$redirect){
        return view('layouts.error',[
            'message' => "$message",
            'descricao' =>  "$descricao",
            'redirect' => "$redirect"
        ]);
    }

    public function email(Request $request){
        if($projecto = Projecto::find($request->projecto_id)){
            if($user = User::where('email',$request->email)->first()){
                if($colaborador = Colaborador::where('user_id',$user->id)->first()){
                    if($user->id != Auth::user()->id ){
                        ColaboracaoProjectos::create([
                            'projecto_id' => $projecto->id,
                            'colaborador_id'=> $colaborador->id
                        ]);
                        $projectosColaboracao = ColaboracaoProjectosController::queryDefault($colaborador);
                        return view("fragments.painel.colaborador",compact('colaborador','projectosColaboracao'));
                    }
                    return view('layouts.warning',[
                        'message' => "Este email já pertence ao proprietário do projecto.",
                        'descricao' =>  "$request->email",
                        'redirect' => "projecto"
                    ]);
                }
                return view('layouts.error',[
                    'message' => "Este email [$request->email] não pertence a um freelancher(colaborador) no sistema.",
                    'descricao' =>  "$request->email",
                    'redirect' => "projecto"
                ]);
            }
            return view('layouts.error',[
                'message' => "Este email não foi encontrado no sistema $request->email.",
                'descricao' =>  "$request->email",
                'redirect' => "projecto"
            ]);
        }
        return view('layouts.error',[
            'message' => "O projecto não foi encotrado.",
            'descricao' =>  "Projecto",
            'redirect' => "projecto"
        ]);
    }

    public function destroy(Request $request){
        if($colaboracao = ColaboracaoProjectos::find($request->id)){
            if($colaborador = Colaborador::find($request->colaborador_id)){
                if($request->colaborador_id == $colaboracao->colaborador_id){
                    $projectosColaboracao = ColaboracaoProjectosController::queryDefault($colaborador);
                    return view("fragments.painel.colaborador",compact('colaborador','projectosColaboracao'));
                }
            }
        }
    }

}
