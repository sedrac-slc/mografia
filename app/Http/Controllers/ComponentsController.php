<?php

namespace App\Http\Controllers;

use App\Components\ListTipoProjecto;
use Illuminate\Http\Request;

class ComponentsController extends Controller
{
    public function listProjectoTipo(){
        return response()->json(ListrojectoTipo::all());
    }
}
