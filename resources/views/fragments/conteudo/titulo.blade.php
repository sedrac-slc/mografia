@extends('layouts.default')
@section('content')
    @include('components.insert.nav-painel')
    <div class="position-relative">
        <div class="container">
            <section class="row g-3 m-auto" id="controls">
                <div class="col-md-3">
                    <div class="input-group">
                        <label class="input-group-text" for="prioridade">prioridade:</label>
                        <input type="number" name="" id="prioridade" class="form-control" min="0"
                            value="{{ $max + 1 }}" />
                    </div>
                </div>
                <div class="col-md-3">
                    <div class="input-group">
                        <label class="input-group-text" for="conteudo">conteudo:</label>
                        <select name="" id="conteudo" class="form-control">
                            @foreach ($conteudo as $con)
                                <option value="{{ $con->id }}">{{ $con->con_descricao }}</option>
                            @endforeach
                        </select>
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="input-group">
                        <label class="input-group-text" for="nome">nome:</label>
                        <input type="text" name="" id="nome" class="form-control" value="parag-{{ $max + 1 }}" />
                    </div>
                </div>
                <div class="col-md-12">
                    <textarea class="form-control" name="" id="text" cols="" rows="3"></textarea>
                </div>
            </section>
        </div>
        <div class="position-absolute top-0 end-0 mr-2">
            <div class="cursor-pointer">
                <i class="fa-solid fa-eye"></i>
            </div>
        </div>
    </div>

    <section class="container mt-4 " style="overflow-y: auto;" id="container">

    </section>
@endsection
@section('javascript')
    <script src="{{ asset('js/conteudo/component.js') }}"></script>
    <script src="{{ asset('js/conteudo/conteudo-titulo.js') }}"></script>
@endsection
