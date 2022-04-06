<?php

namespace App\Http\Controllers;


use App\Models\Projecto;
use App\Http\Requests\ProjectoRequest;

use App\Components\ListTipoProjecto;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;
use Illuminate\Database\QueryException;

class ProjectoController extends Controller
{
    private $tam = 5;

    private function queryDefault(){
        return DB::table('projectos')
                 ->join('temas','projectos.tema_id','=','temas.id')
                 ->where('projectos.user_id',Auth::user()->id)
                 ->select('projectos.*','temas.descricao')
                 ->orderBy('projectos.id','DESC')
                 ->paginate($this->tam);
     }

     public function titulo($id){
        if(!$projecto = Projecto::find($id))
            return redirect()->back();
        $tema = DB::table('temas')->find($projecto->tema_id);
        $titulos = DB::table('titulos')->where('projecto_id',$projecto->id)
                    ->where('user_id',Auth::user()->id)
                    ->orderBy('id','DESC')
                    ->paginate($this->tam);
        $redirect = "projecto";
        $max =  DB::table('titulos')->where(['projecto_id'=>$projecto->id,'user_id'=>Auth::user()->id])->max('prioridade');
        return view("fragments.painel.titulo",compact('redirect','tema','projecto','titulos','max'));
    }

    public function default($id){
        if(!$tema = DB::table('temas')->find($id))
            return redirect()->back();
        $listTipo= ListTipoProjecto::all();
        return view('fragments.painel.projecto.formulario',compact('tema','listTipo'));
    }

    public function elements($id){
        $projectos = Projecto::where('tema_id',$id)->orderBy('id','DESC')->get();
        return json_decode($projectos);
    }

    public function store(ProjectoRequest $request){
      try{
            Projecto::create($request->all());
            $temas = DB::table('temas')->where('user_id',Auth::user()->id)->get();
            $projectos = $this->queryDefault();
            $listTipo = ListTipoProjecto::all();
            $redirect = "projecto";
            return view('fragments.painel.projecto',compact('redirect','projectos','temas','listTipo'));
        }catch(QueryException $e){
            return view('layouts.error',[
                'message' => "Não foi possível criar o projecto,
                              verifica sé não tens um projecto com
                              o mesmo nome e tema.",
                'descricao' =>  "$request->nome",
                'redirect' => "projecto"
            ]);
        }
    }

    public function update(ProjectoRequest $request){
        try{
            //dd($request->all());
            if(!$projecto = Projecto::find($request->id))
                return redirect()->back();
            $listTipo = ListTipoProjecto::all();
            $projecto->update($request->all());
            $temas = DB::table('temas')->where('user_id',Auth::user()->id)->get();
            $projectos = $this->queryDefault();
            $redirect = "projecto";
            return view('fragments.painel.projecto',compact('redirect','projectos','temas','listTipo'));
        }catch(QueryException $e){
            return view('layouts.error',[
                'message' => "Não foi possível actualizar o projecto,
                              verifica sé não tens um projecto com
                              o mesmo nome e tema.",
                'descricao' =>  "$request->nome",
                'redirect' => "projecto"
            ]);
        }
    }

    public function destroy(Request $request){
       // dd($request->all());
        try{
            if(!$projecto = Projecto::find($request->id))
                return redirect()->back();
            $projecto->delete();
            $temas = DB::table('temas')->where('user_id',Auth::user()->id)->get();
            $projectos = $this->queryDefault();
            $listTipo = ListTipoProjecto::all();
            $redirect = "projecto";
            return view('fragments.painel.projecto',compact('redirect','projectos','temas','listTipo'));
        }catch(QueryException $e){
            return view('layouts.error',[
                'message' => "Não foi possível apagar o projecto,
                              verifica sé não tens um projecto com
                              o mesmo nome e tema.",
                'descricao' =>  "$request->nome",
                'redirect' => "projecto"
            ]);
        }

    }

}
