<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\Municipio;

class MunicipioController extends Controller
{
    public function elements( $id ){
        $municipios = Municipio::where('provincia_id',$id)->get();
        return json_decode($municipios);
    }

}
