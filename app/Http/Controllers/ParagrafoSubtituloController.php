<?php

namespace App\Http\Controllers;

use App\Models\{
    Subtitulo,
    ParagrafoSubtitulo
};
use Illuminate\Http\Request;

class ParagrafoSubtituloController extends Controller
{
    public function default($id){
        if(!$subtitulo = Subtitulo::find($id))
            return redirect()->back();
        return view('fragments.conteudo.subtitulo',compact('subtitulo'));
    }
}
