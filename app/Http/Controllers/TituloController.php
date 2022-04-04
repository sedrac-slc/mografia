<?php

namespace App\Http\Controllers;

use App\Models\Titulo;
use App\Http\Requests\TituloRequest;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;
use Illuminate\Database\QueryException;

class TituloController extends Controller
{
    private $tam = 5;

    public function subtitulo($id){
        if(!$titulo = DB::table('titulos')->find($id))
            return redirect()->back();
        $subtitulos = DB::table('subtitulos')->where('titulo_id',$titulo->id)
                                         ->where('user_id',Auth::user()->id)
                                         ->orderBy('id','DESC')
                                         ->paginate($this->tam);
        return view('fragments.painel.subtitulo',compact('titulo','subtitulos'));
    }

    public function default($id){
        if(!$tema = DB::table('temas')->find($id))
            return redirect()->back();
        $titulos = DB::table('titulos')->where('tema_id',$tema->id)
                                       ->where('user_id',Auth::user()->id)
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
                                           ->where('user_id',Auth::user()->id)
                                           ->orderBy('id','DESC')
                                           ->paginate($this->tam);
            $redirect = "projecto";
            return view('fragments.painel.titulo',compact('tema','projecto','titulos','redirect'));
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
                                               ->where('user_id',Auth::user()->id)
                                               ->orderBy('id','DESC')
                                               ->paginate($this->tam);
                $redirect = "projecto";
                return view('fragments.painel.titulo',compact('tema','titulos','projecto','redirect'));
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
                                             ->where('user_id',Auth::user()->id)
                                             ->orderBy('id','DESC')
                                             ->paginate($this->tam);
                $redirect = "projecto";
                return view('fragments.painel.titulo',compact('titulos','projecto','tema','redirect'));
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

    public function store_json(Request $request){
        $titulo = Titulo::create([
            'user_id' => Auth::user()->id,
            'projecto_id' => $request->projecto_id,
            'descricao' => $request->descricao,
            'prioridade' => $request->prioridade
        ]);
        return response()->json($titulo);
    }

    public function destroy_json($id){
        if(!$titulo = Titulo::find($id))
            return response()->json(["delete" => false]);
        $titulo->delete();
        return response()->json(["delete" => true]);
    }

    public function update_json(Request $request){
        if(!$titulo = Titulo::find($request->id))
           return response()->json(["udpate" => false]);
        $titulo->update($request->all());
        return response()->json($titulo);
    }

    public function list_json($id){
        return response()->json(Titulo::where('projecto_id',$id)->get());
    }

}
