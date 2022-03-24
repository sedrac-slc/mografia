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

    public function default($id){
        if(!$tema = DB::table('temas')->find($id))
            return redirect()->back();
        $titulos = DB::table('titulos')->where('tema_id',$tema->id)
                                         ->orderBy('id','DESC')
                                         ->paginate($this->tam);
        return view('fragments.painel.titulo',compact('tema','titulos'));
    }

    public function store(TituloRequest $request){
        try{
            Titulo::create($request->all());
            $tema = DB::table('temas')->find($request->tema_id);
            $titulos = DB::table('titulos')->where('tema_id',$request->tema_id)
                                             ->orderBy('id','DESC')
                                             ->paginate($this->tam);
            return view('fragments.painel.titulo',compact('tema','titulos'));
        }catch(QueryException $e){
            return view('layouts.error',[
                'message' => "Verifica sé Titulo já não existe",
                'descricao' =>  "$request->descricao",
                'routa' => "titulo.page",
                'param' => $request->tema_id
            ]);
        }
    }

    public function update(TituloRequest $request){
        try{
            if(!$titulo = Titulo::find($request->id))
                return redirect()->back();
            $tema = DB::table('temas')->find($request->tema_id);
            $titulo->update($request->all());
            $titulos = DB::table('titulos')->where('tema_id',$request->tema_id)
                                             ->orderBy('id','DESC')
                                             ->paginate($this->tam);
            return view('fragments.painel.titulo',compact('tema','titulos'));
        }catch(QueryException $e){
            return view('layouts.error',[
                'message' => "actualização não foi possível, verifica sé Titulo já não existe",
                'descricao' =>  "$request->descricao",
                'routa' => "titulo.page",
                'param' => $request->tema_id
            ]);
        }
    }

    public function destroy(TituloRequest $request){
        try{
            if(!$titulo = Titulo::find($request->id))
                return redirect()->back();
            $tema = DB::table('temas')->find($request->tema_id);
            $titulo->delete();
            $titulos = DB::table('titulos')->where('tema_id',$request->tema_id)
                                             ->orderBy('id','DESC')
                                             ->paginate($this->tam);
            return view('fragments.painel.titulo',compact('tema','titulos'));
        }catch(QueryException $e){
            return view('layouts.error',[
                'message' => "não foi possível apagar, verifica sé Titulo já não existe",
                'descricao' =>  "$request->descricao",
                'routa' => "titulo.page",
                'param' => $request->tema_id
            ]);
        }
    }

}
