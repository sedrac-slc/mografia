@extends('layouts.painel')
@section('css-painel')
    <link rel="stylesheet"  href="{{asset('css/scrollbar.css')}}"/>
@endsection
@section('content-painel')
<section class="m-auto m-2 p-2" id="">
    <form method="POST" action="{{route('subtitulo.create')}}">
        @csrf
        @include('fragments.error')
        <input type="hidden" value="{{$titulo->id}}" name="titulo_id" id="titulo_id"/>
        <h1 class="h5 text-muted">Novo subtitulo</h1>
        <div class="input-group mb-3">
            <input class="form-control" type="text" name="descricao" id="descricao" autocomplete="none" required/>
            <div class="input-group-append">
                <button type="submit" class="btn btn-primary">criar</button>
            </div>
        </div>
    </form>
    <section class="p-2 m-auto">
        <h1 class="h5 text-muted">
            <a class="text-decoration-none"  href="{{route('titulo.page',$titulo->tema_id)}}">
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
    <script src="{{asset('js/function.js')}}"></script>
@endsection
