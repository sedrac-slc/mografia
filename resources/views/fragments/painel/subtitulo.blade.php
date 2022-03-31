@extends('layouts.painel')
@section('content-painel')
<section class="m-auto m-2 p-2" id="">
    <form method="POST" action="{{route('subtitulo.create')}}">
        @csrf
        @include('fragments.error')
        <input type="hidden" value="{{$titulo->id}}" name="titulo_id" id="titulo_id"/>
        <input type="hidden" name="user_id" value="{{Auth::user()->id}}"/>
        <section class="row g-3 p-2">
            <div class="col-md-6 mt-2">
                <div class="input-group">
                    <span class="input-group-text" id="basic-addon1">Subtitulo</span>
                    <input class="form-control" type="text" name="sub_descricao" id="descricao" autocomplete="none" required/>
                </div>
            </div>
            <div class="col-md-4 mt-2">
                <div class="input-group">
                    <span class="input-group-text" id="basic-addon1">prioridade</span>
                    <input class="form-control" type="number" name="prioridade" id="prioridade" min="0" value="0" autocomplete="none" required/>
                </div>
            </div>
            <div class="col-md-2 mt-2">
                <input type="submit" class="btn btn-primary" value="cria"/>
            </div>
        </section>
    </form>
    <section class="p-2 m-auto">
        <h1 class="h5 text-muted">
            <a class="text-decoration-none"  href="{{route('projecto.titulo',$titulo->projecto_id)}}">
                <i class="fa-solid fa-angles-left"></i>
            </a>
            <span>Titulo\{{$titulo->descricao}}</span>
        </h1>
        <hr/>
        @include('components.table.subtitulo')
     </section>
</section>
@endsection
@section('javascript-painel')
    <script src="{{asset('js/painel/projecto.js')}}"></script>
    <script src="{{asset('js/function.js')}}"></script>
@endsection
