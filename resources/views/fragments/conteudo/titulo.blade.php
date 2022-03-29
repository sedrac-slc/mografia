@extends('fragments.conteudo.layout')
@section('content-conteudo')
<div class="">
     <form action="">
        <textarea class="form-control" name="" id="text" cols="30" rows="3"></textarea>
    </form>
    <div class="border">

    </div>
</div>
<section class="container mt-4 " style="overflow-y: auto;" id="container">

</section>

@endsection
@section('javascript')
    <script src="{{asset('js/conteudo/component.js')}}"></script>
    <script src="{{asset('js/conteudo/conteudo-titulo.js')}}"></script>
@endsection
