@extends('layouts.painel')
@section('content-painel')
 <section class="container mt-3 p-2 m-2 m-auto">
 <div class="">
    <article class="ml-4">
        <h4>Painel de controlo</h4>
        <p class="text-justfy text-indent">
            Bem vindo, ao painel de controlo, terás disponível todas funcionalidades do mografia.
        </p>
        <button type="button" class="btn btn-secondary" data-bs-toggle="tooltip" data-bs-placement="bottom" title="Tooltip on bottom">Tooltip on bottom</button>
        <button type="button" class="btn btn-secondary" data-bs-container="body" data-bs-toggle="popover" data-bs-placement="top" data-bs-content="Vivamus sagittis lacus vel augue laoreet rutrum faucibus.">
            Popover on top
        </button>
        <button type="button" class="btn btn-secondary" data-container="body" data-toggle="popover" data-placement="top" data-content="Vivamus sagittis lacus vel augue laoreet rutrum faucibus.">
                Popover on top
              </button>

    </article>
    <section class="ml-4">
        <div class="list-group" id="group-desc">
            <a href="#" class="list-group-item list-group-item-action flex-column align-items-start active">
                <div class="d-flex w-100 justify-content-between">
                    <h5 class="mb-1">Projectos</h5>
                    <small><i class="fa-solid fa-folder-open"></i></small>
                </div>
                <p class="mb-1 text-justify text-indent">
                    Podes criar vários projecto para isso precisas definir um nome (para o versionamento),
                    o tema em estudo, data de inicio (entrada) e de fim (entrega).
                </p>
                <small>Associado\tema.</small>
            </a>
            <a href="#" class="list-group-item list-group-item-action flex-column align-items-start">
                <div class="d-flex w-100 justify-content-between">
                    <h5 class="mb-1">Temas</h5>
                    <small class="text-muted"><i class="fa-solid fa-bars"></i></small>
                </div>
                <p class="mb-1 text-justify text-indent">
                    O tema representa o objecto de estudo, para cada tema terás que definir os seus titulos,
                    e para cada titulos o seus subtitulos, é através do tema que sé faz a organização dos tópicos.
                </p>
                <small class="text-muted">Associado\titulo\subtitulo.</small>
            </a>
            <a href="#" class="list-group-item list-group-item-action flex-column align-items-start">
                <div class="d-flex w-100 justify-content-between">
                    <h5 class="mb-1">Colaboladores</h5>
                    <small class="text-muted"><i class="fa-solid fa-users"></i></small>
                </div>
                <p class="mb-1 text-justify text-indent">
                    Colaboradores, podes pedir aos outros usuários (users@mografia), para colaborarem com os teus projectos,
                    ou seja outras pessoas podem alterar ou organizar projectos fazendo de forma grátis ou pagas, sé quiseres,
                    trabalhar como colaborador apenas precisas activar essa opção em conta.
                </p>
                <small class="text-muted">Associado\projecto</small>
             </a>
             <a href="#" class="list-group-item list-group-item-action flex-column align-items-start">
                <div class="d-flex w-100 justify-content-between">
                    <h5 class="mb-1">Conta</h5>
                    <small class="text-muted"><i class="fa-solid fa-user"></i></small>
                </div>
                <p class="mb-1 text-justify text-indent">
                        Trás informações da sua conta, poderás alterar e mografia oferece a possibilidade de eliminar,
                        a sua conta permanentimente.
                </p>
                <small class="text-muted">Associado\projecto</small>
             </a>
        </div>
    </section>
  </div>
 </section>
@endsection
@section('javascript-painel')
    <script src="{{asset('js/painel/home.js')}}"></script>
    <script src="{{asset('js/dash.js')}}"></script>
@endsection
