<?php

namespace App\Http\Controllers;

use App\Models\Subtitulo;
use App\Http\Requests\SubtituloRequest;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;
use Illuminate\Database\QueryException;

class SubtituloController extends Controller
{
    private $tam = 5;

    public function default($id){
        if(!$titulo = DB::table('titulos')->find($id))
            return redirect()->back();
        $subtitulos = DB::table('subtitulos')->where('titulo_id',$titulo->id)
                                         ->where('user_id',Auth::user()->id)
                                         ->orderBy('id','DESC')
                                         ->paginate($this->tam);
        $max = DB::table('subtitulos')->where(['titulo_id'=>$titulo->id, 'user_id'=>Auth::user()->id])->max('prioridade');
        return view('fragments.painel.subtitulo',compact('titulo','subtitulos','max'));
    }

    public function store(SubtituloRequest $request){
        try{
            Subtitulo::create($request->all());
            $titulo = DB::table('titulos')->find($request->titulo_id);
            $subtitulos = DB::table('subtitulos')->where('titulo_id',$request->titulo_id)
                                             ->where('user_id',Auth::user()->id)
                                             ->orderBy('id','DESC')
                                             ->paginate($this->tam);
            $max = DB::table('subtitulos')->where(['titulo_id'=>$titulo->id, 'user_id'=>Auth::user()->id])->max('prioridade');
            return view('fragments.painel.subtitulo',compact('titulo','subtitulos','max'));
        }catch(QueryException $e){
            return view('layouts.error',[
                'message' => "Verifica sé subtitulo já não existe",
                'descricao' =>  "$request->descricao",
                'routa' => "subtitulo.page",
                'param' => $request->titulo_id
            ]);
        }
    }

    public function update(SubtituloRequest $request){
        try{
            if(!$subtitulo = Subtitulo::find($request->id))
                return redirect()->back();
            $titulo = DB::table('titulos')->find($request->titulo_id);
            $subtitulo->update($request->all());
            $subtitulos = DB::table('subtitulos')->where('titulo_id',$request->titulo_id)
                                             ->where('user_id',Auth::user()->id)
                                             ->orderBy('id','DESC')
                                             ->paginate($this->tam);
            $max = DB::table('subtitulos')->where(['titulo_id'=>$titulo->id, 'user_id'=>Auth::user()->id])->max('prioridade');
            return view('fragments.painel.subtitulo',compact('titulo','subtitulos','max'));
        }catch(QueryException $e){
            return view('layouts.error',[
                'message' => "actualização não foi possível, verifica sé subitulo já não existe",
                'descricao' =>  "$request->descricao",
                'routa' => "subtitulo.page",
                'param' => $request->titulo_id
            ]);
        }
    }

    public function destroy(SubtituloRequest $request){
        try{
            if(!$subtitulo = Subtitulo::find($request->id))
                return redirect()->back();
            $titulo = DB::table('titulos')->find($request->titulo_id);
            $subtitulo->delete();
            $subtitulos = DB::table('subtitulos')->where('titulo_id',$request->titulo_id)
                                             ->where('user_id',Auth::user()->id)
                                             ->orderBy('id','DESC')
                                             ->paginate($this->tam);
            $max = DB::table('subtitulos')->where(['titulo_id'=>$titulo->id, 'user_id'=>Auth::user()->id])->max('prioridade');
            return view('fragments.painel.subtitulo',compact('titulo','subtitulos','max'));
        }catch(QueryException $e){
            return view('layouts.error',[
                'message' => "não foi possível apagar, verifica sé subtitulo já não existe",
                'descricao' =>  "$request->descricao",
                'routa' => "subtitulo.page",
                'param' => $request->titulo_id
            ]);
        }
    }

    public function store_json(Request $request){
        $subtitulo = Subtitulo::create([
            'user_id' => Auth::user()->id,
            'titulo_id' => $request->titulo_id,
            'descricao' => $request->descricao,
            'prioridade' => $request->prioridade
        ]);
        return response()->json($subtitulo);
    }

    public function destroy_json($id){
        if(!$subtitulo = Subtitulo::find($id))
            return response()->json(["delete" => false]);
        $subtitulo->delete();
        return response()->json(["delete" => true]);
    }

    public function update_json(Request $request){
        if(!$subtitulo = Subtitulo::find($request->id))
           return response()->json(["udpate" => false]);
        $subtitulo->update($request->all());
        return response()->json($subtitulo);
    }

    public function list_json($id){
        return response()->json(Subtitulo::where('titulo_id',$id)->get());
    }

    public function max_prioridade_json($id){
        return response()->json(['max'=>DB::table('subtitulos')
            ->where(['titulo_id'=>$id,'user_id'=>Auth::user()->id])
            ->max('prioridade')
        ]);
    }

}
