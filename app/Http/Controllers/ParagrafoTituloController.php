<?php

namespace App\Http\Controllers;

use App\Models\{
    Titulo,
    ParagrafoTitulo
};

use Illuminate\Http\Request;

class ParagrafoTituloController extends Controller
{
    public function default($id){
        if(!$titulo = Titulo::find($id))
            return redirect()->back();
        return view('fragments.conteudo.titulo',compact('titulo'));
    }

}
