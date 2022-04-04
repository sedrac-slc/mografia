@extends('layouts.default')
@section('title','mografia/cadastramento')
@section('bg-body','class=bg-dark')
@section('css')
    <style>
        #gerar{
            cursor: pointer;
        }
    </style>
@endsection
@section('javascript')
    <script src="{{asset('js/register.js')}}"></script>
@endsection
@section('content')
<section class="container p-2 bg-light w-75 m-auto mt-4">
    <a class="text-danger ml-3" href="{{ route('home') }}">
        <i class="fa-solid fa-angles-left"></i>
        <span>voltar</span>
    </a>
    <form method="POST" action="{{route('register.user')}}" class="p-3">
        {{ csrf_field() }}
         @include('fragments.error')
       <input type="hidden" name="provider" value="mografia"/>
       <input type="hidden" name="provider_id" value="null"/>
       <section class="row g-3">
        <div class="col-md-6">
            <label for="nome_completo" class="form-label">
                <i class="fa-regular fa-user"></i>
                <span>Nome completo:</span>
             </label>
             <input type="text" name="nome_completo" id="nome_completo" value="{{old('nome_completo')}}" class="form-control" id="nome_completo" required/>
        </div>
        <div class="col-md-6">
            <label for="name" class="form-label">
                <i class="fa-solid fa-desktop"></i>
                <span>Username</span>
            </label>
            <div class="input-group mb-3">
                <input type="text" name="name" id="name" class="form-control" placeholder="usuario"/>
                <span class="input-group-text bg-dark text-white" id="gerar">Gerar</span>
            </div>
        </div>
        {{-- Email Address --}}
        <div class="col-md-4">
            <label for="email" class="form-label">
                <i class="fa-solid fa-at"></i>
                <span>Email</span>
            </label>
            <input id="email" class="form-control" type="email" name="email" value="{{old('email')}}" required />
        </div>
        {{-- Password --}}
        <div class="col-md-4">
            <label for="password" class="form-label">
                <i class="fa-solid fa-key"></i>
                <span>Senha</span>
            </label>
            <input id="password" class="form-control" type="password" name="password" required autocomplete="new-password" />
        </div>
        {{-- Confirm Password --}}
        <div class="col-md-4">
            <label for="password_confirmation" class="form-label">
                <i class="fa-solid fa-lock"></i>
                <span>Confirma (senha)</span>
            </label>
            <input id="password_confirmation" class="form-control" type="password" name="password_confirmation" required />
        </div>
        {{-- genero--}}
        <div class="col-md-4">
            <label for="genero" class="form-label">
                <i class="fa-solid fa-mars-and-venus"></i>
                <span>Género</span>
            </label>
            <select id="genero" name="genero"  class="form-select" required>
                <option value="MASCULINO">Masculino</option>
                <option value="FEMENINO">Femenino</option>
            </select>
        </div>
        {{-- Data nascimento--}}
        <div class="col-md-4">
                <label for="data_nascimento" class="form-label">
                    <i class="fa-solid fa-calendar-days"></i>
                    <span class="ml-3">Data nascimento</span>
                </label>
                <input type="date" class="form-control" value="{{old('data_nascimento')}}" id="data_nascimento" name="data_nascimento" placeholder="yyy-mm-dd" required/>
             </div>
        {{-- telefone --}}
        <div class="col-md-4">
            <label for="telefone" class="form-label">
                <i class="fa-solid fa-mobile"></i>
                <span class="ml-3">Telefone</span>
            </label>
            <input id="telefone" class="form-control" type="text" name="telefone" value="{{old('telefone')}}" required autofocus />
        </div>
        </section>
        <div class="p-2 text-center">
            <button type="submit" name="submit" class="btn btn-outline-info m-2">
                <i class="fa-solid fa-user-lock"></i>
                <span>Cadastra</span>
            </button>
            <div class="mt-2">
                <a class="text-decoration-none" href="{{ route('login') }}">
                    <span>Já tenho uma conta?</span>
                </a><br/>
                <a class="mt-4 ml-2 text-decoration-none" href="{{ route('home') }}">
                    página inicial
                </a>
            </div>
        </div>
    </form>
</section>
@endsection
@section('javascript-painel')
    <script src="{{asset('js/painel/colaborador.js')}}"></script>
@endsection
