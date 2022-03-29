<?php

namespace App\Http\Controllers;

use App\Models\{User,Colaborador};
use Illuminate\Http\Request;

class ColaboradorController extends Controller
{
    public function insert($id){
        if(!$user = User::find($id))
            return view("fragments.painel.colaborador");
        $colaborador = Colaborador::create(['user_id'=>$id]);
        return view("fragments.painel.colaborador",compact('colaborador'));
    }
}
