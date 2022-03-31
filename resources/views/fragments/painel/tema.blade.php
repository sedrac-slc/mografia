@extends('layouts.painel')
@section('content-painel')
<section class="m-auto m-2 p-2" id="">
    <form method="POST" action="{{route('tema.create')}}">
        @csrf
        @include('fragments.error')
        <input type="hidden" value="{{Auth::user()->id}}" name="user_id" id="user_id"/>
        <div class="input-group mb-3">
            <input class="form-control" type="text" name="descricao" id="descricao" autocomplete="none" placeholder="Novo tema" required/>
            <div class="input-group-append">
                <button type="submit" class="btn btn-primary">criar</button>
            </div>
        </div>
    </form>
    <section class="p-2 m-auto">
        @include('components.table.tema')
     </section>
</section>
@endsection
@section('javascript-painel')
    <script src="{{asset('js/painel/tema.js')}}"></script>
@endsection
