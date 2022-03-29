<?php

namespace App\Http\Controllers;

use App\Models\Titulo;
use App\Http\Requests\TituloRequest;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Database\QueryException;

class TituloController extends Controller
{
    private $tam = 5;

    public function subtitulo($id){
        if(!$titulo = DB::table('titulos')->find($id))
            return redirect()->back();
        $subtitulos = DB::table('subtitulos')->where('titulo_id',$titulo->id)
                                         ->orderBy('id','DESC')
                                         ->paginate($this->tam);
        return view('fragments.painel.subtitulo',compact('titulo','subtitulos'));
    }

    public function default($id){
        if(!$tema = DB::table('temas')->find($id))
            return redirect()->back();
        $titulos = DB::table('titulos')->where('tema_id',$tema->id)
                                       ->orderBy('id','DESC')
                                       ->paginate($this->tam);
        $redirect = "tema";
        return view('fragments.painel.titulo',compact('redirect','tema','titulos'));
    }

    public function store(TituloRequest $request){
        try{
            if(!$projecto = DB::table('projectos')->find($request->projecto_id))
                return redirect()->back();
            Titulo::create($request->all());
            $tema = DB::table('temas')->find($projecto->tema_id);
            $titulos = DB::table('titulos')->where('projecto_id',$request->projecto_id)
                                           ->orderBy('id','DESC')
                                           ->paginate($this->tam);
            return view('fragments.painel.titulo',compact('tema','projecto','titulos'));
        }catch(QueryException $e){
            return view('layouts.error',[
                'message' => "Verifica sé Titulo já não existe",
                'descricao' =>  "$request->descricao",
                'redirect' => "projecto"
            ]);
        }
    }

    public function update(TituloRequest $request){
        try{
           if($titulo = Titulo::find($request->id) ){
                if(!$projecto = DB::table('projectos')->find($request->projecto_id))
                        return redirect()->back();
                $tema = DB::table('temas')->find($projecto->tema_id);
                $titulo->update($request->all());
                $titulos = DB::table('titulos')->where('projecto_id',$projecto->id)
                                               ->orderBy('id','DESC')
                                               ->paginate($this->tam);
                return view('fragments.painel.titulo',compact('tema','titulos','projecto'));
            }
           return redirect()->back();
        }catch(QueryException $e){
            return view('layouts.error',[
                'message' => "actualização não foi possível, verifica sé Titulo já não existe",
                'descricao' =>  "$request->descricao",
                'redirect' => "projecto"
            ]);
        }
    }

    public function destroy(TituloRequest $request){
        try{
            //dd($request->all());
            if($titulo = Titulo::find($request->id)){
                if(!$projecto = DB::table('projectos')->find($request->projecto_id))
                        return redirect()->back();
                $tema = DB::table('temas')->find($projecto->tema_id);
                $titulo->delete();
                $titulos = DB::table('titulos')->where('projecto_id',$request->projecto_id)
                                             ->orderBy('id','DESC')
                                             ->paginate($this->tam);
                return view('fragments.painel.titulo',compact('titulos','projecto','tema'));
            }
            return redirect()->back();
      }catch(QueryException $e){
            return view('layouts.error',[
                'message' => "não foi possível apagar, verifica sé Titulo já não existe",
                'descricao' =>  "$request->descricao",
                'redirect' => "projecto"
            ]);
        }
    }

}
