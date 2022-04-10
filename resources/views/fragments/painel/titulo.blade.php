@extends('layouts.painel')
@section('content-painel')
<section class="m-auto m-2 p-1 align-center" id="">
    <form method="POST" action="{{route('titulo.create')}}" class="m-auto">
        @csrf
        @include('fragments.error')
        <input type="hidden" name="user_id" value="{{Auth::user()->id}}"/>
        <input type="hidden" value="{{$projecto->id}}" name="projecto_id" id=""/>
        <section class="row g-3 p-2 ml-3">
            <div class="col-md-6 mt-2">
                <div class="input-group">
                    <span class="input-group-text" id="basic-addon1">Titulo</span>
                    <input class="form-control" type="text" name="descricao" id="descricao" autocomplete="none" required/>
                </div>
            </div>
            <div class="col-md-3 mt-2">
                <div class="input-group">
                    <span class="input-group-text" id="basic-addon1">prioridade</span>
                    <input class="form-control" type="number" name="prioridade" id="prioridade" min="{{ $max + 1}}" value="{{ $max +1 }}" autocomplete="none" required/>
                </div>
            </div>
            <div class="col-md-3 mt-2 d-flex">
               <input type="submit" class="btn btn-primary m-1" value="cria"/>
               <button type="button" class="btn btn-secondary m-1" data-toggle="tooltip" data-placement="bottom"
                        title="Projecto: {{$projecto->nome}}">
                    <i class="fa-solid fa-folder-open"></i>
               </button>
               <button type="button" class="btn btn-secondary m-1" data-toggle="tooltip" data-placement="bottom"
                       title="Tema: {{$tema->descricao}}">
                    <i class="fa-solid fa-folder-tree"></i>
                </button>
            </div>
        </section>
    </form>
    <section class="p-1 m-auto">
        @include('components.table.titulo')
        <a class="btn btn-primary mt-2 rounded" href="{{ route('titulo.relatorio') }}">
            relatório
        </a>
     </section>
</section>
@endsection
@section('javascript-painel')
    <script src="{{asset('js/painel/projecto.js')}}"></script>
    <script src="{{asset('js/function.js')}}"></script>
@endsection
