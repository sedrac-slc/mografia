@extends('layouts.painel')
@section('content-painel')
    <section class="container">
        @if (count($temas) > 0)
            <button class="btn btn-primary mb-2" id="btn">
                <i class="fa-solid fa-eye"></i>
                <span>Oculta\Mostra</span>
            </button>
            <div class="p-2 border view">
                <form action="{{ route('tema.view.projecto') }}" method="POST">
                    @csrf
                    <input type="hidden" name="redirect" value="projecto" />
                    <label for="tema_id" class="form-label">
                        <i class="fa-solid fa-bars"></i>
                        <span>Escolha o tema:</span>
                    </label>
                    <div class="input-group mb-3">
                        <select class="form-control" name="tema_id" id="tema_id">
                            @foreach ($temas as $tema)
                                <option value="{{ $tema->id }}">{{ $tema->descricao }}</option>
                            @endforeach
                        </select>
                        <button type="submit" class=" btn btn-primary" id="basic-addon2">avançar</button>
                    </div>
                </form>
            </div>

            @if (count($projectos) > 0)
                <hr class="view" />
                @include('components.table.projecto')
            @else
                <section class="container m-auto border rounded p-2 mt-2">
                    <h5 class="text-monospace text-center text-danger border-bottom font-weight-bold">De momento não há
                        nenhum, registos de projectos.</h5>
                    <ul class="list-group">
                        <li class="list-group-item text-justify">
                            <i class="fa-solid fa-info text-warning"></i>
                            <span>
                                Para criar o um projecto,escolha o tema, na caixa de seleção acima depois clica no butão
                                [avançar], serás levado, para o formulario de criação de projecto.
                            </span>
                        </li>
                        <li class="list-group-item text-justify">
                            <i class="fa-solid fa-warning text-danger"></i>
                            <span>
                                <span class="text-warning font-weight-bold">Obs: </span>
                                <span>No formulário, deves garantir que o tema, nome, orcamento, acesso, tipo do projecto,
                                    representam um registo único.</span>
                                <br/>
                                <span class="text-warning font-weight-bold">Ex.: </span>
                                <span>Se já criaste um projecto com as seguinte propridades: tema=investigação de ensino em Angola, nome=fim de curso, orcamento=10000, acesso=público, tipo=monografia, não poderás criar mais nenhum projecto, com essas propriedades senão irás receber um erro.</span>
                            </span>
                        </li>
                    </ul>
                </section>
            @endif
        @else
            @include('components.insert.informacoes.projecto')
        @endif
    </section>
@endsection
@section('javascript-painel')
    <script src="{{ asset('js/painel/projecto.js') }}"></script>
    <script src="{{ asset('js/produto/produto.formulario.js') }}"></script>
@endsection
