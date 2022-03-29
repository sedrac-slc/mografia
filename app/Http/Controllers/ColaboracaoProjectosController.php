<?php

namespace App\Http\Controllers;

use App\Models\{
    Colaborador, Projecto
};
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ColaboracaoProjectosController extends Controller
{
    public function colaborar($id){
        if($projecto = Projecto::find($id))
            return view("fragments.painel.colaborador.freelanchers",compact('projecto'));
        return view("dashboard");
    }

}
