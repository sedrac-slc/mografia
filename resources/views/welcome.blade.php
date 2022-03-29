@extends('layouts.default')
@section('content')
<nav class="navbar navbar-expand-lg navbar-dark bg-primary">
    <div class="container-fluid">
      <a class="navbar-brand" href="#">mografia</a>
      <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
      </button>
      <div class="collapse navbar-collapse" id="navbarSupportedContent">
        <ul class="navbar-nav me-auto mb-2 mb-lg-0">
          <li class="nav-item">
            <a class="nav-link active" aria-current="page" href="#">
                <i class="fa-solid fa-house text-white"></i>
                <span class="ml-3">Home</span>
            </a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="#">
                <i class="fa-solid fa-list-ul text-white"></i>
                <span class="ml-3">Temas</span>
            </a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="#">
                <i class="fa-solid fa-circle-info text-white"></i>
                <span class="ml-3">Informações</span>
            </a>
          </li>
          <li class="nav-item dropdown">
            <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                <i class="fa-solid fa-keyboard text-white"></i>
                <span class="ml-3">Serviços</span>
            </a>
            <ul class="dropdown-menu" aria-labelledby="navbarDropdown">
              <li><a class="dropdown-item" href="#">Action</a></li>
              <li><a class="dropdown-item" href="#">Another action</a></li>
              <li><hr class="dropdown-divider"></li>
              <li><a class="dropdown-item" href="#">Something else here</a></li>
            </ul>
          </li>
        </ul>

      </div>
    </div>
  </nav>

  <section class="container w-75 mt-4 border bg-white">

    <section class="m-2 p-2">
        <article>
            <h4 class="ml-4">Bem vido</h4>
            <p class="text-justfy text-indent">O eimono é um web site, que auxilia,
                na preparação do seu trabalho de fim curso.
                Podes contratar pessoas (Freelancer) para fazerem o seu trabalho de fim curso.
            </p>
        </article>
        <section class="mt-2 p-2 w-75 m-auto text-center">
            <h4>Login</h4>
            <hr/>
            <div class="row">
                <div class="col m-1">
                    <div class="text-center">
                        <i class="fa-brands fa-google fa-3x"></i>
                        <p>Google</p>
                    </div>
                </div>
                <div class="col m-1">
                    <div class="text-center">
                        <i class="fa-brands fa-facebook fa-3x"></i>
                        <p>Facebook</p>
                    </div>
                </div>
            </div>
        </section>
    </section>

    <div class="mt-1 mb-4 text-center">
        @if (Route::has('login'))
            @auth
                <a href="{{ route('painel') }}" class=" text-decoration-none">
                        <i class="fa-solid fa-panel-ews"></i>
                    <span>Painel</span>
                </a>
                @else
                    <a href="{{ route('login') }}" class="btn btn-primary m-2">
                        <i class="fa-solid fa-user-lock"></i>
                        <span>Login</span>
                    </a>
                    @if (Route::has('register'))
                        <a href="{{ route('register') }}" class="btn btn-info m-2">
                            <i class="fa-solid fa-user-pen"></i>
                            <span>Cadastra</span>
                        </a>
                    @endif
            @endauth
        @endif
    </div>

  </section>

@endsection
