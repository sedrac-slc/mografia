@extends('layouts.painel')
@section('css-painel')
@endsection
@section('content-painel')
<section class="container m-auto">
    @if(count($projectos->all()) > 0)
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
        <div class="">
            <div class="mt-3" id="titulo-lista">

            </div>
        </div>
    @else
        @include('components.insert.informacoes.indece')
    @endif
</section>

<input type="hidden" id="url-add-titulo" value="{{route('titulo.store.json')}}"/>
<input type="hidden" id="url-del-titulo" value="{{route('titulo.delete.json','param')}}"/>
<input type="hidden" id="url-upd-titulo" value="{{route('titulo.update.json')}}"/>
<input type="hidden" id="url-lis-titulo" value="{{route('titulo.list.json','parm')}}"/>
<input type="hidden" id="url-max-titulo" value="{{route('titulo.max.prioridade.json','parm')}}"/>

<input type="hidden" id="url-add-subtitulo" value="{{route('subtitulo.store.json')}}"/>
<input type="hidden" id="url-del-subtitulo" value="{{route('subtitulo.delete.json','param')}}"/>
<input type="hidden" id="url-upd-subtitulo" value="{{route('subtitulo.update.json')}}"/>
<input type="hidden" id="url-lis-subtitulo" value="{{route('subtitulo.list.json','parm')}}"/>
<input type="hidden" id="url-max-subtitulo" value="{{route('subtitulo.max.prioridade.json','parm')}}"/>

@include('components.modal.update.indece.form')
@include('components.modal.delete.indece.form')

@endsection
@section('javascript-painel')

    <script src="{{asset('js/indece/components-subtitulo.js')}}"></script>
    <script src="{{asset('js/indece/components-titulo.js')}}"></script>
    <script src="{{asset('js/indece/default.js')}}"></script>
@endsection
