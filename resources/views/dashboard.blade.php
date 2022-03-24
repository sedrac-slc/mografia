@extends('layouts.painel')
@section('content-painel')
 <section class="container mt-3 p-2 m-2 m-auto">
 <div class="">
    <article class="ml-4">
        <h4>Painel de controlo</h4>
        <p class="text-justfy text-indent">
            Bem vindo, ao painel de controlo, terás disponível todas funcionalidades do mografia.
        </p>
    </article>
    <section class="ml-4">
        <div class="list-group">
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
                    ou seja outras pessoas podem alterar ou organizar projectos fazendo de forma grátis ou pagas.
                </p>
                <small class="text-muted">Associado\projecto</small>
             </a>
        </div>
    </section>
  </div>
 </section>
@endsection
