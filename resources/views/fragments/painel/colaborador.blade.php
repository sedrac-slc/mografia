@extends('layouts.painel')
@section('content-painel')
<section class="container">
    @isset($colaborador)
    <nav>
        <div class="nav nav-tabs mb-3" id="nav-tab" role="tablist">
          <button class="nav-link  active" id="nav-actualizar-tab" data-bs-toggle="tab" data-bs-target="#nav-actualizar" type="button" role="tab" aria-controls="nav-actualizar" aria-selected="false">Projectos\colaboração</button>
          <button class="nav-link" id="nav-informacao-tab" data-bs-toggle="tab" data-bs-target="#nav-informacao" type="button" role="tab" aria-controls="nav-formacao" aria-selected="true">Colaboradores</button>
        </div>
    </nav>
        <div class="tab-content p-2 m-auto m-2" id="nav-tabContent">
            <div class="tab-pane fade active show" id="nav-actualizar" role="tabpanel" aria-labelledby="nav-actualizar-tab">
                @include('components.table.colaboracao.default')
            </div>
            <div class="tab-pane fade" id="nav-informacao" role="tabpanel" aria-labelledby="nav-informacao-tab">
                <table class="table">
                    <thead>
                        <th>email</th>
                        <th>username</th>
                    </thead>
                    <tbody>
                        @foreach ($colaboradores as $colaborador)
                            <tr>
                                <td>{{$colaborador->email}}</td>
                                <td>{{$colaborador->nome_completo}}</td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    @else
        @include('fragments.painel.colaborador.default')
    @endisset
</section>
@endsection
@section('javascript-painel')
    <script src="{{asset('js/painel/colaborador.js')}}"></script>
@endsection
