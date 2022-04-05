@extends('layouts.default')
@section('content')
<div class="">
     <form action="">
        <textarea class="form-control" name="" id="text" cols="30" rows="3"></textarea>
    </form>
    <div class="border">

    </div>
</div>
<section class="container mt-4 " style="overflow-y: auto;" id="container">
    <div class="parg border bg-white">
        <div class="m-1 border-bottom pb-2">
            @include('fragments.conteudo.form')
        </div>
        <div class="p-1 ml-2 mr-2">
            <div class="parg-descricao mb-1 text-justify" id="parg-descricao">
                Lorem ipsum dolor sit amet consectetur, adipisicing elit. Nobis ea amet rem veritatis omnis laboriosam.
                Cum sequi odio at dolor, reprehenderit tempore pariatur dolores quae expedita, officiis, neque cupiditate incidunt.
            </div>
            <div class="d-flex text-center mb-2 mt-1 border-top pt-2">
                <a href="#" class="text-primary text-decoration-none">
                    <i class="fa-solid fa-eye"></i>
                    <span>oculta</span>
                </a>
                <a href="#" class="ml-2 text-danger text-decoration-none">
                    <i class="fa-solid fa-close"></i>
                    <span>eliminar</span>
                </a>
                <a href="#" class="ml-2 text-info text-decoration-none">
                    <i class="fa-solid fa-pencil"></i>
                    <span>actualização</span>
                </a>
                <a href="#" class="ml-2 text-success text-decoration-none">
                    <i class="fa-solid fa-share"></i>
                    <span>compartilha</span>
                </a>
            </div>
         </div>
    </div>
</section>
@endsection
@section('javascript')
    <script src="{{asset('js/conteudo/component.js')}}"></script>
    <script src="{{asset('js/conteudo/conteudo-subtitulo.js')}}"></script>
@endsection
