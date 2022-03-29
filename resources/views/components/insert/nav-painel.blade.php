<nav class="navbar navbar-expand-lg navbar-dark bg-primary mb-2">
    <div class="container-fluid">
      <a class="navbar-brand" href="#">mografia</a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                <li class="nav-item">
                    <a class="nav-link" href="{{route('painel.page','projecto')}}">
                        <i class="fa-solid fa-folder-open text-white"></i>
                        <span class="ml-3">Projectos</span>
                    </a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="{{route('painel.page','tema')}}">
                        <i class="fa-solid fa-bars text-white"></i>
                        <span class="ml-3">Temas</span>
                    </a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="{{route('painel.page','colaborador')}}">
                        <i class="fa-solid fa-users text-white"></i>
                        <span>Colaboladores</span>
                    </a>
                </li>
                <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle" id="navbarDropdown" href="#" role="button" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false">Auth/User</a>
                    @include('components.insert.user')
                </li>
            </ul>
        </div>
    </div>
</nav>
