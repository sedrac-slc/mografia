@extends('layouts.painel')
@section('content-painel')
<section class="m-auto m-2 p-2" id="">
    <form method="POST" action="{{route('titulo.create')}}" class="m-auto">
        @csrf
        @include('fragments.error')
        <input type="hidden" name="user_id" value="{{Auth::user()->id}}"/>
        <input type="hidden" value="{{$projecto->id}}" name="projecto_id" id=""/>
        <section class="row g-3 p-2">
            <div class="col-md-6 mt-2">
                <div class="input-group">
                    <span class="input-group-text" id="basic-addon1">Titulo</span>
                    <input class="form-control" type="text" name="descricao" id="descricao" autocomplete="none" required/>
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
        <h6 class="text-muted">
            <a class="text-decoration-none"  href="{{route('painel.page',$redirect)}}">
                <i class="fa-solid fa-angles-left"></i>
            </a>
            <span>{{$tema->descricao}}\{{$projecto->nome}}</span>
        </h6>
        <hr/>
        @include('components.table.titulo')
     </section>
</section>
@endsection
@section('javascript-painel')
    <script src="{{asset('js/painel/projecto.js')}}"></script>
    <script src="{{asset('js/function.js')}}"></script>
@endsection
