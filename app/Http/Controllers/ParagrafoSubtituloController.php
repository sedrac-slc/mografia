<?php

namespace App\Http\Controllers;

use App\Models\{
    ConteudoTipo,
    Subtitulo,
    ParagrafoSubtitulo,
    Titulo
};
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ParagrafoSubtituloController extends Controller
{
    public function default($id){
        if(!$subtitulo = Subtitulo::find($id))
            return redirect()->back();
        $tipo = "subtitulo";
        $conteudo =  ConteudoTipo::all();
        $max = ParagrafoSubtitulo::where(['subtitulo_id'=>$id , 'user_id'=>Auth::user()->id])->max('prioridade');
        return view('fragments.conteudo.default',compact('subtitulo','max','conteudo','tipo'));
    }

    public function store_json(Request $request){
        $paragrafo = ParagrafoSubtitulo::create([
            'titulo_id'=>$request->titulo_id,
            'user_id'=>Auth::user()->id,
            'nome'=>$request->nome,
            'descricao'=>$request->descricao,
            'conteudo_tipo_id'=>$request->conteudo_tipo_id,
            'prioridade'=>$request->prioridade
        ]);
        return response()->json($paragrafo);
    }

    public function show_json($subtitulo){
        $regis = ParagrafoSubtitulo::where(['user_id'=>Auth::user()->id,'subtitulo_id'=>$subtitulo])->get();
        return response()->json($regis);
    }

    public function delete_json($id){
        if(!$paragrafo = ParagrafoSubtitulo::find($id))
            return response()->json(["delete"=>false]);
        $paragrafo->delete();
        return response()->json(["delete"=>true]);
    }

}
