@extends('layouts.painel')
@section('content-painel')
<section class="container">
    @isset($projectos)
    <div class="input-group mb-3">
        <a class="input-group-text text-decoration-none cursor-pointer bg-primary text-white">
            <i class="fa-solid fa-folder-tree"></i>
        </a>
        <select class="form-control" data-toggle="tooltip" data-placement="bottom" title="Tema\Projecto">
            @foreach($projectos as $projecto)
            <option value="{{$projecto->id}}">{{$projecto->descricao}}\{{$projecto->nome}}</option>
            @endforeach
        </select>
    </div>
    @endisset
</section>
@endsection
@section('javascript-painel')
    <script src="{{asset('js/painel/indece.js')}}"></script>
@endsection
