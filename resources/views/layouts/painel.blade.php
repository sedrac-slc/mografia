@extends('layouts.default')
@section('title','mografia/painel')
@section('css')
    <link rel="stylesheet" href="{{asset('css/geral.css')}}"/>
    <link rel="stylesheet" href="{{asset('css/sidebar.css')}}"/>
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
            <a href="#">eimono</a>
        </div>
        <div class="list-group list-group-flush">{{--
            <a class="list-group-item list-group-item-action list-group-item-light p-3" href="#">
                <i class="fa-solid fa-elevator"></i>
                <span>Gerenciamento</span>
            </a>--}}
            <a class="list-group-item list-group-item-action list-group-item-light p-3" href="{{route('painel.page','projecto')}}">
                <i class="fa-solid fa-folder-open"></i>
                <span>Projectos</span>
            </a>
            <a class="list-group-item list-group-item-action list-group-item-light p-3" href="{{route('painel.page','tema')}}">
                <i class="fa-solid fa-bars"></i>
                <span>Temas</span>
            </a>
            <a class="list-group-item list-group-item-action list-group-item-light p-3" href="#">
                <i class="fa-solid fa-users"></i>
                <span>Colaboladores</span>
            </a>{{--
            <a class="list-group-item list-group-item-action list-group-item-light p-3" href="#">
                <i class="fa-solid fa-money-bill-wave"></i>
                <span>Pagamento</span>
            </a>--}}
           <a class="list-group-item list-group-item-action list-group-item-light p-3" href="#">
                <i class="fa-solid fa-user"></i>
                <span>Conta</span>
            </a>
        </div>
    </div>

    <div id="page-content-wrapper">
        <nav class="navbar navbar-expand-lg navbar-dark bg-dark border-bottom">
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
                            <div class="dropdown-menu dropdown-menu-end" aria-labelledby="navbarDropdown">
                                <a class="dropdown-item" href="#!">{{Auth::user()->name}}</a>
                                <a class="dropdown-item" href="#!">{{Auth::user()->email}}</a>
                                <div class="dropdown-divider"></div>
                                <form method="POST" class="text-center bg-danger m-2 rounded" action="{{route('logout')}}">
                                    @csrf
                                    <button class="btn btn-danger w-100" type="submit">Logout</button>
                                </form>
                            </div>
                        </li>
                    </ul>
                </div>
            </div>
            @isset($page)
                <form class="bg-light m-2 p-2 rounded">

                </form>
            @endisset
        </nav>

        <div class="container p-2">
            @yield('content-painel')
        </div>

    </div>

</div>

@endsection
