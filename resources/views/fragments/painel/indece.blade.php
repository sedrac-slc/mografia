@extends('layouts.painel')
@section('css-painel')
<style>
 .cursor-pointer{
     cursor: pointer;
 }
</style>
@endsection
@section('content-painel')
<section class="container m-auto">
    @isset($projectos)
        <section id="formulario-titulo">
        @csrf
            <div class="input-group">
                <a class="input-group-text text-decoration-none cursor-pointer bg-primary text-white" id="titulo-open" data-toggle="tooltip" data-placement="bottom" title="titulo">
                    <i class="fa-solid fa-folder-tree"></i>
                </a>
                <select class="form-control" id="projecto-id" data-toggle="tooltip" data-placement="left" title="Tema\Projecto">
                    @foreach($projectos as $projecto)
                    <option value="{{$projecto->id}}">{{$projecto->descricao}} \ {{$projecto->nome}}</option>
                    @endforeach
                </select>
            </div>
            @include('components.insert.indece.titulo')
        </section>
        <div class="mt-3" id="titulo-lista">

        </div>

    <input type="hidden" id="url-add-titulo" value="{{route('titulo.store.json')}}"/>
    <input type="hidden" id="url-add-subtitulo" value="{{route('subtitulo.store.json')}}"/>

    @endisset
</section>
@endsection
@section('javascript-painel')
   <script src="{{asset('js/indece/components.js')}}"></script>
    <script src="{{asset('js/painel/indece.js')}}"></script>
@endsection
