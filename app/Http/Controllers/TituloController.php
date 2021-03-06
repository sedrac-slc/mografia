<?php

namespace App\Http\Controllers;

use App\Models\Titulo;
use App\Http\Requests\TituloRequest;
//use Barryvdh\DomPDF\PDF;
use Barryvdh\DomPDF\Facade\Pdf;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;
use Illuminate\Database\QueryException;

class TituloController extends Controller
{
    private $tam = 5;

    public function subtitulo($id){
        if(!$titulo = DB::table('titulos')->find($id))
            return redirect()->back();
        $subtitulos = DB::table('subtitulos')->where('titulo_id',$titulo->id)
                                         ->where('user_id',Auth::user()->id)
                                         ->orderBy('id','DESC')
                                         ->paginate($this->tam);
        $max = DB::table('subtitulos')->where(['titulo_id'=>$titulo->id, 'user_id'=>Auth::user()->id])->max('prioridade');
        return view('fragments.painel.subtitulo',compact('titulo','subtitulos','max'));
    }

    public function default($id){
        if(!$tema = DB::table('temas')->find($id))
            return redirect()->back();
        $titulos = DB::table('titulos')->where('tema_id',$tema->id)
                                       ->where('user_id',Auth::user()->id)
                                       ->orderBy('id','DESC')
                                       ->paginate($this->tam);
        $redirect = "tema";
        //$max =  DB::table('titulos')->where(['projecto_id'=>$projecto->id,'user_id'=>Auth::user()->id])->max('prioridade');
        return view('fragments.painel.titulo',compact('redirect','tema','titulos'));
    }

    public function store(TituloRequest $request){
        try{
            if(!$projecto = DB::table('projectos')->find($request->projecto_id))
                return redirect()->back();
            Titulo::create($request->all());
            $tema = DB::table('temas')->find($projecto->tema_id);
            $titulos = DB::table('titulos')->where('projecto_id',$request->projecto_id)
                                           ->where('user_id',Auth::user()->id)
                                           ->orderBy('id','DESC')
                                           ->paginate($this->tam);
            $redirect = "projecto";
            $max =  DB::table('titulos')->where(['projecto_id'=>$projecto->id,'user_id'=>Auth::user()->id])->max('prioridade');
            return view('fragments.painel.titulo',compact('tema','projecto','titulos','redirect','max'));
        }catch(QueryException $e){
            return view('layouts.error',[
                'message' => "Verifica s?? Titulo j?? n??o existe",
                'descricao' =>  "$request->descricao",
                'redirect' => "projecto"
            ]);
        }
    }

    public function update(TituloRequest $request){
        try{
           if($titulo = Titulo::find($request->id) ){
                if(!$projecto = DB::table('projectos')->find($request->projecto_id))
                        return redirect()->back();
                $tema = DB::table('temas')->find($projecto->tema_id);
                $titulo->update($request->all());
                $titulos = DB::table('titulos')->where('projecto_id',$projecto->id)
                                               ->where('user_id',Auth::user()->id)
                                               ->orderBy('id','DESC')
                                               ->paginate($this->tam);
                $redirect = "projecto";
                $max =  DB::table('titulos')->where(['projecto_id'=>$projecto->id,'user_id'=>Auth::user()->id])->max('prioridade');
                return view('fragments.painel.titulo',compact('tema','titulos','projecto','redirect','max'));
            }
           return redirect()->back();
        }catch(QueryException $e){
            return view('layouts.error',[
                'message' => "actualiza????o n??o foi poss??vel, verifica s?? Titulo j?? n??o existe",
                'descricao' =>  "$request->descricao",
                'redirect' => "projecto"
            ]);
        }
    }

    public function destroy(TituloRequest $request){
        try{
            //dd($request->all());
            if($titulo = Titulo::find($request->id)){
                if(!$projecto = DB::table('projectos')->find($request->projecto_id))
                        return redirect()->back();
                $tema = DB::table('temas')->find($projecto->tema_id);
                $titulo->delete();
                $titulos = DB::table('titulos')->where('projecto_id',$request->projecto_id)
                                             ->where('user_id',Auth::user()->id)
                                             ->orderBy('id','DESC')
                                             ->paginate($this->tam);
                $redirect = "projecto";
                $max =  DB::table('titulos')->where(['projecto_id'=>$projecto->id,'user_id'=>Auth::user()->id])->max('prioridade');
                return view('fragments.painel.titulo',compact('titulos','projecto','tema','redirect','max'));
            }
            return redirect()->back();
      }catch(QueryException $e){
            return view('layouts.error',[
                'message' => "n??o foi poss??vel apagar, verifica s?? Titulo j?? n??o existe",
                'descricao' =>  "$request->descricao",
                'redirect' => "projecto"
            ]);
        }
    }

    public function store_json(Request $request){
        $titulo = Titulo::create([
            'user_id' => Auth::user()->id,
            'projecto_id' => $request->projecto_id,
            'descricao' => $request->descricao,
            'prioridade' => $request->prioridade
        ]);
        return response()->json($titulo);
    }

    public function destroy_json($id){
        if(!$titulo = Titulo::find($id))
            return response()->json(["delete" => false]);
        $titulo->delete();
        return response()->json(["delete" => true]);
    }

    public function update_json(Request $request){
        if(!$titulo = Titulo::find($request->id))
           return response()->json(["udpate" => false]);
        $titulo->update($request->all());
        return response()->json($titulo);
    }

    public function list_json($id){
        return response()->json(Titulo::where('projecto_id',$id)->get());
    }

    public function max_prioridade_json($id){
        return response()->json(['max'=>DB::table('titulos')
            ->where(['projecto_id'=>$id,'user_id'=>Auth::user()->id])
            ->max('prioridade')
        ]);
    }

    public function relatorio(Request $request){
        $titulos = Titulo::where('user_id',Auth::user()->id)->get();
        $pdf = PDF::loadView("relatorio.titulo",compact('titulos'));
        return $pdf->setPaper('a4')->stream('titulo');
    }

}
