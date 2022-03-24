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

    private function pro(){
        return DB::table('projectos')
                 ->join('temas','projectos.tema_id','=','temas.id')
                 ->select('projectos.*','temas.descricao')
                 ->orderBy('projectos.id','DESC')
                 ->paginate($this->tam);
     }

    public function default($id){
        if(!$tema = DB::table('temas')->find($id))
            return redirect()->back();
        $listTipo= ListTipoProjecto::all();
        return view('fragments.painel.projecto.formulario',compact('tema','listTipo'));
    }

    public function store(ProjectoRequest $request){
        try{
            Projecto::create($request->all());
            $temas = DB::table('temas')->where('user_id',Auth::user()->id)->get();
            $projectos = $this->pro();
            $listTipo = ListTipoProjecto::all();
            return view('fragments.painel.projecto',compact('projectos','temas','listTipo'));
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
            if(!$projecto = Projecto::find($request->id))
                return redirect()->back();
            $projecto->update($request->all());
            $temas = DB::table('temas')->where('user_id',Auth::user()->id)->get();
            $projectos = $this->pro();
            $listTipo = ListTipoProjecto::all();
            return view('fragments.painel.projecto',compact('projectos','temas','listTipo'));
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
            $projectos = $this->pro();
            $listTipo = ListTipoProjecto::all();
            return view('fragments.painel.projecto',compact('projectos','temas','listTipo'));
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
