<div class="dropdown-menu dropdown-menu-end" aria-labelledby="navbarDropdown">
        <a class="dropdown-item" href="#">
            <i class="fa-solid fa-user"></i>
            <span>{{Auth::user()->name}}</span>
        </a>
        <div class="mt-2 mb-2"></div>
        <a class="dropdown-item" href="#">
            <i class="fa-solid fa-at"></i>
            <span>{{Auth::user()->email}}</span>
        </a>
        <div class="dropdown-divider"></div>
        <form method="POST" class="text-center bg-danger m-2 rounded" action="{{route('logout')}}">
            @csrf
            <button class="btn btn-danger w-100" type="submit">Logout</button>
        </form>
</div>
