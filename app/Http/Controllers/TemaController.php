<?php

namespace App\Http\Controllers;

use App\Models\Tema;
use App\Http\Requests\TemaRequest;
use App\Components\ListTipoProjecto;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Database\QueryException;

class TemaController extends Controller
{

    private $tam = 5;

    public function elements( $desc){
        $temas = Tema::where('user_id',Auth::user()->id)
                            ->where('descricao','like',"%$desc%")
                            ->get();
        return json_decode($temas);
    }

    public function project(Request $request){
        if(!$tema = Tema::find($request->tema_id))
            return redirect()->back();
        $listTipo = ListTipoProjecto::all();
        return view('fragments.painel.projecto.formulario',compact('tema','listTipo'));
    }

    public function store(TemaRequest $request){
        try{
            Tema::create($request->all());
            $temas = Tema::where('user_id',Auth::user()->id)
                                        ->orderBy('id','DESC')
                                        ->paginate($this->tam);
            return view('fragments.painel.tema',compact('temas'));
        }catch(QueryException $e){
            return view('layouts.error',[
                'message' => "Verifica sé tema já não existe",
                'descricao' =>  "$request->descricao",
                'redirect' => "tema"
            ]);
        }
    }

    public function update(TemaRequest $request){
        try{
            if(!$tema = Tema::find($request->id))
                return redirect()->back();

            $tema->update($request->all());
            $temas = Tema::where('user_id',$request->user_id)
                                ->orderBy('id','DESC')
                                ->paginate($this->tam);
            return view('fragments.painel.tema',compact('temas'));
        }catch(QueryException $e){
            return view('layouts.error',[
                'message' => "não foi possível actualizar, verifica sé tema já não existe",
                'descricao' =>  "$request->descricao",
                'redirect' => "tema"
            ]);
        }
    }

    public function destroy(TemaRequest $request){
        try{
            if(!$tema = Tema::find($request->id))
                return redirect()->back();
            $tema->delete();
            $temas = Tema::where('user_id',$request->user_id)
                               ->orderBy('id','DESC')
                               ->paginate($this->tam);
            return view('fragments.painel.tema',compact('temas'));
        }catch(QueryException $e){
            return view('layouts.error',[
                'message' => "não foi possível apagar o tema",
                'descricao' =>  "$request->descricao",
                'redirect' => "tema"
            ]);
        }
    }

}
