@extends('layouts.default')
@section('title','mografia/painel')
@section('css')
    <link rel="stylesheet" href="{{asset('css/geral.css')}}"/>
    <link rel="stylesheet" href="{{asset('css/sidebar.css')}}"/>
    <link rel="stylesheet"  href="{{asset('css/scrollbar.css')}}"/>
    @yield('css-painel')
@endsection
@section('javascript')
    <script src="{{asset('js/sidebar.js')}}"></script>
    @yield('javascript-painel')
@endsection
@section('content')
<div class="d-flex bg-white" id="wrapper">

    <div class="border-end bg-white" id="sidebar-wrapper">
        <div class="sidebar-heading border-bottom bg-light">
            <a href="#" class="text-decoration-none">monografia</a>
        </div>
        <div class="list-group list-group-flush">
            <a class="list-group-item list-group-item-action list-group-item-light p-3" href="{{route('painel.page','home')}}" id="home">
                <i class="fa-solid fa-circle-info"></i>
                <span>Informações</span>
            </a>
            <a class="list-group-item list-group-item-action list-group-item-light p-3" href="{{route('painel.page','tema')}}" id="tema">
                <i class="fa-solid fa-bars"></i>
                <span>Temas</span>
            </a>
            <a class="list-group-item list-group-item-action list-group-item-light p-3" href="{{route('painel.page','projecto')}}" id="projecto">
                <i class="fa-solid fa-folder-open"></i>
                <span>Projectos</span>
            </a>
            <a class="list-group-item list-group-item-action list-group-item-light p-3" href="{{route('painel.page','indece')}}" id="indece">
                <i class="fa-solid fa-book"></i>
                <span>indece</span>
            </a>
            <a class="list-group-item list-group-item-action list-group-item-light p-3" href="{{route('painel.page','colaborador')}}" id="colaborador">
                <i class="fa-solid fa-users"></i>
                <span>Colaboladores</span>
            </a>
           <a class="list-group-item list-group-item-action list-group-item-light p-3" href="{{route('painel.page','conta')}}" id="conta">
                <i class="fa-solid fa-user"></i>
                <span>Conta</span>
            </a>
            <a class="list-group-item list-group-item-action list-group-item-light p-3" href="#">
                <i class="fa-solid fa-money-bill-wave"></i>
                <span>Pagamento</span>
            </a>
        </div>
    </div>

    <div id="page-content-wrapper">
        <nav class="navbar navbar-expand-lg navbar-dark bg-primary border-bottom">
            <div class="container-fluid">
                <button class="btn btn-primary" id="sidebarToggle">
                    <i class="fa-solid fa-angles-left" id="icone"></i>
                </button>
                <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation"><span class="navbar-toggler-icon"></span></button>
                <div class="collapse navbar-collapse" id="navbarSupportedContent">
                    <ul class="navbar-nav ms-auto mt-2 mt-lg-0">
                        <li class="nav-item active"><a class="nav-link" href="{{route('home')}}">
                            <i class="fa-solid fa-home"></i>
                            <span> Home </span>
                        </a></li>
                        <li class="nav-item dropdown">
                            <a class="nav-link dropdown-toggle" id="navbarDropdown" href="#" role="button" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false">Auth/User</a>
                            @include('components.insert.user')
                        </li>
                        <li class="nav-item dropdown">
                            <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                                <i class="fa-solid fa-keyboard text-white"></i>
                                <span class="ml-3">Relatório</span>
                            </a>
                            <ul class="dropdown-menu text-center" aria-labelledby="navbarDropdown">
                              <li>
                                <a class="dropdown-item" href="{{ route('titulo.relatorio') }}">
                                    titulo
                                </a>
                              </li>
                              <a class="dropdown-item" href="{{ route('subtitulo.relatorio') }}">
                                    subtitulo
                              </a>
                              <li><hr class="dropdown-divider"></li>
                              <li>
                                <a class="dropdown-item" href="{{ route('subtitulo.relatorio') }}">
                                   indece
                                </a>
                              </li>
                            </ul>
                        </li>
                    </ul>
                </div>
            </div>
        </nav>

        <div class="container p-2">
            @yield('content-painel')
        </div>

    </div>

</div>

@endsection
