@extends('layouts.painel')
@section('content-painel')
<section class="container">
    @isset($colaborador)
        <div class="m-2 p-2 m-auto">

            @include('components.table.colaboracao.default')
        </div>
    @else
        @include('fragments.painel.colaborador.default')
    @endisset
</section>
@endsection
@section('javascript-painel')
    <script src="{{asset('js/painel/colaborador.js')}}"></script>
@endsection
