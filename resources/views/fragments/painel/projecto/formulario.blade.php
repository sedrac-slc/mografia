@extends('layouts.default')
@section('javascript')
    <script src="{{asset('js/produto.formulario.js')}}"></script>
@endsection
@section('content')
<nav class="navbar navbar-expand-lg navbar-dark bg-dark mb-2">
    <div class="container-fluid">
      <a class="navbar-brand" href="#">mografia</a>
    </div>
</nav>
<section class="m-auto w-75 p-2">
    <div class="text-center">
        <h4>{{$tema->descricao}}</h4>
    </div>
    <hr/>
    <form action="{{route('projecto.create')}}" class="border p-2 rounded" method="POST">
        @csrf
        <input type="hidden" name="tema_id" value="{{$tema->id}}"/>
        <input type="hidden" name="user_id" value="{{Auth::user()->id}}"/>
        @include('fragments.error')
        <section class="row g-3 p-2">
          <div class="col-md-12 mt-2 d-none" id="data_err">
            <div class="alert alert-danger alert-dismissible fade show" role="alert">
                A data de inicio não pode ser maior que a data de fim ou de entrega.
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
            </div>
          </div>
          <div class="col-md-12">
             <label for="nome" class="form-label">
                <i class="fa-solid fa-file-signature"></i>
                <span>Nome projecto:</span>
              </label>
              <input type="text" name="nome" id="nome" value="{{old('nome')}}" class="form-control" id="nome_completo" required/>
          </div>
          <div class="col-md-6 mt-2">
            <label for="acesso" class="form-label">
                <i class="fa-solid fa-universal-access"></i>
                <span>Acesso:</span>
            </label>
            <select name="acesso" id="acesso" class="form-select form-control">
                <option value="PUBLICO">Público</option>
                <option value="PRIVADO">Privado</option>
                <option value="PROTEGIDO">Protegido</option>
            </select>
          </div>
          <div class="col-md-6 mt-2">
            <label for="tipo" class="form-label">
                    <i class="fa-solid fa-folder-tree"></i>
                    <span>Tipo:</span>
            </label>
            <select name="tipo" id="" class="form-select">
                @foreach($listTipo as $tipo)
                    <option value="{{$tipo->getCodigo()}}">{{$tipo->getDescricao()}}</option>
                @endforeach
            </select>
          </div>
          <div class="col-md-6 mt-2">
            <label for="data_inicio" class="form-label">
                <i class="fa-solid fa-calendar-check"></i>
                <span>Data inicio:</span>
            </label>
            <input class="form-control" type="date" name="data_inicio" id="data_inicio"/>
          </div>
          <div class="col-md-6 mt-2">
              <label for="data_fim" class="form-label">
                 <i class="fa-solid fa-calendar-day"></i>
                 <span>Data fim:</span>
              </label>
              <input class="form-control" type="date" name="data_fim" id="data_fim"/>
           </div>
           <div class="col-md-12 mt-2">
                <label for="descricao" class="form-label">
                    <i class="fa-solid fa-message"></i>
                    <span class="ml-3">Descrição</span>
                </label>
                <textarea class="form-control" value="" id="descricao" name="pro_descricao"></textarea>
            </div>
        </section>
        <div>
            <button type="submit" class="btn btn-primary">salvar</button>
        </div>
    </form>
</section>
@endsection
