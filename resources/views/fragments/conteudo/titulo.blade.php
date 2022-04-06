@extends('layouts.default')
@section('bg-body', 'class=bg-primary')
@section('content')
    @include('components.insert.nav-painel')
    <div class="position-relative">
        <div class="container bg-white rounded">
            <input type="hidden" name="accao" id="accao" value="add" />
            <section class="row g-3 mb-3" id="controls">
                <div class="col-md-3 uni all">
                    <div class="input-group">
                        <label class="input-group-text" for="prioridade">prioridade:</label>
                        <input type="number" name="" id="prioridade" class="form-control" min="0"
                            value="{{ $max + 1 }}" />
                    </div>
                </div>
                <div class="col-md-3 uni all">
                    <div class="input-group">
                        <label class="input-group-text" for="conteudo">conteudo:</label>
                        <select name="" id="conteudo" class="form-control">
                            @foreach ($conteudo as $con)
                                <option value="{{ $con->id }}">{{ $con->con_descricao }}</option>
                            @endforeach
                        </select>
                    </div>
                </div>
                <div class="col-md-6 uni all">
                    <div class="input-group">
                        <label class="input-group-text" for="nome">nome:</label>
                        <input type="text" name="" id="nome" class="form-control" value="parag-{{ $max + 1 }}" />
                    </div>
                </div>
                <div class="col-md-12 all mb-3">
                    <textarea class="form-control" name="" id="text" cols="" rows="3"></textarea>
                </div>
            </section>
        </div>
        <div class="position-absolute top-0 end-0 mr-2">
            {{-- <div class="cursor-pointer p-2">
                <i class="fa-solid fa-eye fa-2x"></i>
                {{-- <i class="fa-solid fa-eye-slash fa-2x"></i> --
            </div> --}}
            <div class="p-2 mt-3 border rounded bg-primary">
                <div class="cursor-pointer text-white" data-toggle="popover" title="Popover title"
                    data-content="And here's some amazing content. It's very engaging. Right?">
                    <i class="fa-brands fa-wpforms fa-2x"></i>
                </div>
                <div class="cursor-pointer mt-2 text-white" data-toggle="popover" title="Popover title"
                    data-content="And here's some amazing content. It's very engaging. Right?">
                    <i class="fa-solid fa-align-left fa-2x"></i>
                </div>
                <div class="cursor-pointer mt-2 text-white" data-toggle="popover" title="Popover title"
                    data-content="And here's some amazing content. It's very engaging. Right?">
                    <i class="fa-solid fa-file fa-2x"></i>
                </div>
            </div>
        </div>
    </div>

    <section class="container mt-4 p-2 d-none" id="page">
        <section class="mb-2">
            <h6 class="ml-4 text-muted">{{ $titulo->prioridade }}.{{ $titulo->descricao }}</h6>
        </section>
        <section id="container" class="mt-2 position-relative">

        </section>
    </section>
@endsection
@section('javascript')
    <script src="{{ asset('js/conteudo/component.js') }}"></script>
    <script src="{{ asset('js/conteudo/conteudo-titulo.js') }}"></script>
@endsection
