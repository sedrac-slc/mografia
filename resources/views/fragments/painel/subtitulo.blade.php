@extends('layouts.painel')
@section('content-painel')
<section class="m-auto m-2 p-1 align-center" id="">
    <form method="POST" action="{{route('subtitulo.create')}}">
        @csrf
        @include('fragments.error')
        <input type="hidden" value="{{$titulo->id}}" name="titulo_id" id="titulo_id"/>
        <input type="hidden" name="user_id" value="{{Auth::user()->id}}"/>
        <section class="row g-3 p-2 ml-3">
            <div class="col-md-6 mt-1">
                <div class="input-group">
                    <span class="input-group-text" id="basic-addon1">Subtitulo</span>
                    <input class="form-control" type="text" name="descricao" id="descricao" autocomplete="none" required/>
                </div>
            </div>
            <div class="col-md-4 mt-1">
                <div class="input-group">
                    <span class="input-group-text" id="basic-addon1">prioridade</span>
                    <input class="form-control" type="number" name="prioridade" id="prioridade" min="0" value="0" autocomplete="none" required/>
                </div>
            </div>
            <div class="col-md-2 mt-1 d-flex">
                <input type="submit" class="btn btn-primary m-1" value="cria"/>
                <button type="button" class="btn btn-secondary m-1" data-toggle="tooltip" data-placement="bottom"
                    title="Titulos: {{$titulo->descricao}}">
                    <i class="fa-solid fa-folder-tree"></i>
                </button>
            </div>
        </section>
    </form>
    <section class="">
        @include('components.table.subtitulo')
     </section>
</section>
@endsection
@section('javascript-painel')
    <script src="{{asset('js/painel/projecto.js')}}"></script>
    <script src="{{asset('js/function.js')}}"></script>
@endsection
