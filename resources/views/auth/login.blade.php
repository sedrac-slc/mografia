@extends('layouts.default')
@section('title','mografia/autenticação')
@section('bg-body','class=bg-primary')
@section('content')
<section class="container m-auto w-50 top-20 mt-5 border rounded bg-light">
    <form method="POST" action="{{ route('login') }}"  class="p-2 m-2 ">
         @csrf
         @include('fragments.error')
        {{-- Email Address --}}
        <div class="">
            <label for="email" class="form-label">
                <i class="fa-solid fa-at"></i>
                <span>Email</span>
            </label>
            <input id="email" class="form-control" type="email" name="email" value="{{old('email')}}" required />
        </div>
        {{-- Password --}}
        <div class="mt-4">
            <label for="password" class="form-label">
                <i class="fa-solid fa-key"></i>
                <span>Senha</span>
            </label>
            <input id="password" class="form-control" type="password" name="password" required autocomplete="current-password"/>
        </div>
        {{-- Remember Me --}}
        <div class="mt-4 form-check">
            <input id="remember_me" type="checkbox" class="form-check-input" name="remember">
            <label class="form-check-label" for="remember_me">Check me out</label>
        </div>
        <div class="text-center">
            <div class="mt-4 mb-4">
                <button class="btn btn-outline-primary ml-3">
                    <i class="fa-solid fa-user-pen"></i>
                    <span>Logar?</span>
                </button>
            </div>
            @if (Route::has('password.request'))
                <a class="mt-4 ml-2 text-decoration-none" href="{{ route('password.request') }}">
                    Esqueceste a senha?
                </a>
                <br/>
                <a class="mt-4 ml-2 text-decoration-none" href="{{ route('home') }}">
                   página inicial
                </a>
            @endif
        </div>
    </form>
</section>
@endsection
