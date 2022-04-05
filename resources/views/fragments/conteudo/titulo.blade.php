@extends('layouts.default')
@section('content')
    @include('components.insert.nav-painel')
    <div class="container">
        <form action="">
            <section class="row g-3">
                <div class="col-md-2">
                    <input type="number" name="" id="prioridade" class="form-control" value="" />
                </div>
                <div class="col-md-4">
                    <input type="text" name="" id="nome" class="form-control"/>
                </div>
                <div class="col-md-6">
                    <select name="" id="conteudo" class="form-control">

                    </select>
                </div>
            </section>
            <textarea class="form-control mt-1" name="" id="text" cols="30" rows="3"></textarea>
        </form>
        <div class="border">

        </div>
    </div>
    <section class="container mt-4 " style="overflow-y: auto;" id="container">

    </section>
@endsection
@section('javascript')
    <script src="{{ asset('js/conteudo/component.js') }}"></script>
    <script src="{{ asset('js/conteudo/conteudo-titulo.js') }}"></script>
@endsection
