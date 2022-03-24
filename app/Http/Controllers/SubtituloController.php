<?php

namespace App\Http\Controllers;

use App\Models\Subtitulo;
use App\Http\Requests\SubtituloRequest;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Database\QueryException;

class SubtituloController extends Controller
{
    private $tam = 5;

    public function default($id){
        if(!$titulo = DB::table('titulos')->find($id))
            return redirect()->back();
        $subtitulos = DB::table('subtitulos')->where('titulo_id',$titulo->id)
                                         ->orderBy('id','DESC')
                                         ->paginate($this->tam);
        return view('fragments.painel.subtitulo',compact('titulo','subtitulos'));
    }

    public function store(SubtituloRequest $request){
        try{
            Subtitulo::create($request->all());
            $titulo = DB::table('titulos')->find($request->titulo_id);
            $subtitulos = DB::table('subtitulos')->where('titulo_id',$request->titulo_id)
                                             ->orderBy('id','DESC')
                                             ->paginate($this->tam);
            return view('fragments.painel.subtitulo',compact('titulo','subtitulos'));
        }catch(QueryException $e){
            return view('layouts.error',[
                'message' => "Verifica sé subtitulo já não existe",
                'descricao' =>  "$request->descricao",
                'routa' => "subtitulo.page",
                'param' => $request->titulo_id
            ]);
        }
    }

    public function update(SubtituloRequest $request){
        try{
            if(!$subtitulo = Subtitulo::find($request->id))
                return redirect()->back();
            $titulo = DB::table('titulos')->find($request->titulo_id);
            $subtitulo->update($request->all());
            $subtitulos = DB::table('subtitulos')->where('titulo_id',$request->titulo_id)
                                             ->orderBy('id','DESC')
                                             ->paginate($this->tam);
            return view('fragments.painel.subtitulo',compact('titulo','subtitulos'));
        }catch(QueryException $e){
            return view('layouts.error',[
                'message' => "actualização não foi possível, verifica sé subitulo já não existe",
                'descricao' =>  "$request->descricao",
                'routa' => "subtitulo.page",
                'param' => $request->titulo_id
            ]);
        }
    }

    public function destroy(SubtituloRequest $request){
        try{
            if(!$subtitulo = Subtitulo::find($request->id))
                return redirect()->back();
            $titulo = DB::table('titulos')->find($request->titulo_id);
            $subtitulo->delete();
            $subtitulos = DB::table('subtitulos')->where('titulo_id',$request->titulo_id)
                                             ->orderBy('id','DESC')
                                             ->paginate($this->tam);
            return view('fragments.painel.subtitulo',compact('titulo','subtitulos'));
        }catch(QueryException $e){
            return view('layouts.error',[
                'message' => "não foi possível apagar, verifica sé subtitulo já não existe",
                'descricao' =>  "$request->descricao",
                'routa' => "subtitulo.page",
                'param' => $request->titulo_id
            ]);
        }
    }
}
