@extends('layouts.default')
@section('bg-body', 'class=bg-primary')
@section('content')
    @include('components.insert.nav-painel')
    <div class="position-relative">
        <form class="container bg-white rounded " id="controls">
            @csrf
            <input type="hidden" id="tipo" value="{{ $tipo }}"/>
            <input type="hidden" name="" id="id" value="">
            @if($tipo == "titulo")
              @isset($titulo)
                <input type="hidden" id="chave" name="titulo_id" value="{{ $titulo->id }}"/>
              @endisset
            @elseif($tipo == "subtitulo")
              @isset($subtitulo)
                <input type="hidden" id="chave" name="subtitulo_id" value="{{ $subtitulo->id }}"/>
              @endisset
            @endif
            <input type="hidden" name="accao" id="accao" value="add" />

            <section class="row g-3 mb-3" id="controls">
                <div class="col-md-3 uni all">
                    <div class="input-group">
                        <label class="input-group-text" for="prioridade">prioridade:</label>
                        <input type="number" name="prioridade" id="prioridade" class="form-control" min="0"
                            value="{{ $max + 1 }}" />
                    </div>
                </div>
                <div class="col-md-3 uni all">
                    <div class="input-group">
                        <label class="input-group-text" for="conteudo">conteudo:</label>
                        <select name="conteudo_tipo_id" id="conteudo_id" class="form-control">
                            @foreach ($conteudo as $con)
                                <option value="{{ $con->id }}">{{ $con->con_descricao }}</option>
                            @endforeach
                        </select>
                    </div>
                </div>
                <div class="col-md-6 uni all">
                    <div class="input-group">
                        <label class="input-group-text" for="nome">nome:</label>
                        <input type="text" name="nome" id="nome" class="form-control" value="parag-{{ $max + 1 }}" />
                    </div>
                </div>
                <div class="col-md-12 all mb-3">
                    <textarea class="form-control" name="descricao" id="text" cols="" rows="3"></textarea>
                </div>
            </section>
        </form>
        <div class="position-absolute top-0 end-0 mr-2">
            {{-- <div class="cursor-pointer p-2">
                <i class="fa-solid fa-eye fa-2x"></i>
                {{-- <i class="fa-solid fa-eye-slash fa-2x"></i> --
            </div> --}}
            <div class="p-1 text-center border rounded bg-primary">
                <div class="cursor-pointer mt-2 text-white"  data-toggle="tooltip" data-placement="left" title="Oculta formulario"
                    id="parg-controls">
                    <i class="fa-brands fa-wpforms fa-2x"></i>
                </div>
                <div class="cursor-pointer mt-2 text-white"  data-toggle="tooltip" data-placement="left" title="Ocultar componentes"
                    id="parg-uni">
                    <i class="fa-solid fa-rectangle-list fa-2x"></i>
                </div>
                <div class="cursor-pointer mt-2 text-white"  data-toggle="tooltip" data-placement="left" title="Ocultar butões de acção"
                    id="parg-accao">
                    <i class="fa-solid fa-eye fa-2x"></i>
                </div>
            </div>
        </div>
    </div>

    <section class="container mt-4 p-2 d-none" id="page">
        <section class="mb-2">
            @isset($titulo)
                <h6 class="ml-4 text-muted">{{ $titulo->prioridade }}.{{ $titulo->descricao }}</h6>
            @endisset
            @isset($subtitulo)
                <h6 class="ml-4 text-muted">{{ $subtitulo->prioridade }}.{{ $subtitulo->descricao }}</h6>
            @endisset
        </section>
        <section id="container" class="mt-2 position-relative">

        </section>
    </section>

   @if($tipo == "titulo")
        @isset($titulo)
        <input type="hidden" name="" id="url-add" value="{{ route('conteudo.titulo.store.json') }}"/>
        <input type="hidden" name="" id="url-show" value="{{ route('conteudo.titulo.show.json',$titulo->id) }}"/>
        <input type="hidden" name="" id="url-delete" value="{{ route('conteudo.titulo.delete.json','parm') }}"/>
        <input type="hidden" name="" id="url-upd" value="{{ route('conteudo.titulo.update.json','parm') }}"/>
        @endisset
   @elseif($tipo == "subtitulo")
        @isset($subtitulo)
        <input type="hidden" name="" id="url-add" value="{{ route('conteudo.subtitulo.store.json') }}"/>
        <input type="hidden" name="" id="url-show" value="{{ route('conteudo.subtitulo.show.json',$subtitulo->id) }}"/>
        <input type="hidden" name="" id="url-delete" value="{{ route('conteudo.subtitulo.delete.json','parm') }}"/>
        <input type="hidden" name="" id="url-upd" value="{{ route('conteudo.subtitulo.update.json','parm') }}"/>
        @endisset
   @endif
@endsection
@section('javascript')
   <script src="{{ asset('js/conteudo/component.js') }}"></script>
   <script src="{{ asset('js/conteudo/conteudo-titulo.js') }}"></script>
@endsection
