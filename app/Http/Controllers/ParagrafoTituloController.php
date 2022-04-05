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
        $conteudo =  ConteudoTipo::all();
        $max = ParagrafoTitulo::where(['titulo_id'=>$id , 'user_id'=>Auth::user()->id])->max('prioridade');
        return view('fragments.conteudo.titulo',compact('titulo','max','conteudo'));
    }

}
