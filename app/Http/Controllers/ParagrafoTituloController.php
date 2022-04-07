<?php

namespace App\Http\Controllers;

use App\Models\{
    ConteudoTipo,
    Titulo,
    ParagrafoTitulo
};

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ParagrafoTituloController extends Controller
{
    public function default($id){
        if(!$titulo = Titulo::find($id))
            return redirect()->back();
        $tipo = "titulo";
        $conteudo =  ConteudoTipo::all();
        $max = ParagrafoTitulo::where(['titulo_id'=>$id , 'user_id'=>Auth::user()->id])->max('prioridade');
        return view('fragments.conteudo.default',compact('titulo','max','conteudo','tipo'));
    }

    public function store_json(Request $request){
        $paragrafo = ParagrafoTitulo::create([
            'titulo_id'=>$request->titulo_id,
            'user_id'=>Auth::user()->id,
            'nome'=>$request->nome,
            'descricao'=>$request->descricao,
            'conteudo_tipo_id'=>$request->conteudo_tipo_id,
            'prioridade'=>$request->prioridade
        ]);
        return response()->json($paragrafo);
    }

    public function show_json($titulo){
        $regis = ParagrafoTitulo::where(['user_id'=>Auth::user()->id,'titulo_id'=>$titulo])->get();
        return response()->json($regis);
    }

    public function delete_json($id){
        if(!$paragrafo = ParagrafoTitulo::find($id))
            return response()->json(["delete"=>false]);
        $paragrafo->delete();
        return response()->json(["delete"=>true]);
    }

}
