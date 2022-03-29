@extends('layouts.painel')
@section('content-painel')
<nav>
    <div class="nav nav-tabs mb-3" id="nav-tab" role="tablist">
      <button class="nav-link" id="nav-actualizar-tab" data-bs-toggle="tab" data-bs-target="#nav-actualizar" type="button" role="tab" aria-controls="nav-actualizar" aria-selected="false">Actualização</button>
      <button class="nav-link active" id="nav-informacao-tab" data-bs-toggle="tab" data-bs-target="#nav-informacao" type="button" role="tab" aria-controls="nav-formacao" aria-selected="true">Informações</button>
      <button class="nav-link" id="nav-formacao-tab" data-bs-toggle="tab" data-bs-target="#nav-formacao" type="button" role="tab" aria-controls="nav-formacao" aria-selected="false">Formações</button>
      <button class="nav-link" id="nav-senha-tab" data-bs-toggle="tab" data-bs-target="#nav-senha" type="button" role="tab" aria-controls="nav-senha" aria-selected="false">Senha</button>
    </div>
</nav>

<div class="tab-content border m-2" id="nav-tabContent">
    <div class="tab-pane fade" id="nav-actualizar" role="tabpanel" aria-labelledby="nav-actualizar-tab">
        <section class="container">´
            <form method="POST" action="{{ route('register') }}" class="">
                @csrf
                @include('fragments.error')
              <section class="row g-3">
               <div class="col-md-6">
                   <label for="nome_completo" class="form-label">
                       <i class="fa-regular fa-user"></i>
                       <span>Nome completo:</span>
                    </label>
                    <input type="text" name="nome_completo" id="nome_completo" value="{{old('nome_completo')}}" class="form-control" required/>
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
               {{-- genero--}}
               <div class="col-md-4">
                   <label for="genero" class="form-label">
                       <i class="fa-solid fa-mars-and-venus"></i>
                       <span>Género</span>
                   </label>
                   <select id="genero" name="genero"  class="form-select form-control" required>
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
               <div class="p-2">
                   <button type="submit" name="submit" class="btn btn-outline-warning m-2">
                       <i class="fa-solid fa-arrows-rotate"></i>
                       <span>Actualizar</span>
                   </button>
               </div>
           </form>
        </section>
    </div>
    <div class="tab-pane fade active show" id="nav-informacao" role="tabpanel" aria-labelledby="nav-informacao-tab">
        <form action="#" class="border p-2 rounded" method="POST">
            @csrf
            <input type="hidden" name="user_id" value="{{Auth::user()->id}}"/>
            @include('fragments.error')
            <h6 class="ml-3 mr-3 border-bottom pb-2">Residência\Naturalidade</h6>
            <section class="row g-3 p-2">
                <div class="col-md-4">
                    <label for="nacionalidade_id" class="form-label">
                        <i class="fa-solid fa-flag"></i>
                        <span>Nacionalidade:</span>
                    </label>
                    @isset($nacionalidades)
                    <select class="form-select form-control" id="nacionalidade_id" name="nacionalidade_id">
                        @foreach($nacionalidades as $nacionalidade)
                            <option value="{{$nacionalidade->id}}">{{$nacionalidade->nac_descricao}}</option>
                        @endforeach
                    </select>
                    @endisset
                </div>
                <div class="col-md-4">
                    <label for="provincia_id" class="form-label">
                        <i class="fa-solid fa-earth-africa"></i>
                        <span>Provincias:</span>
                    </label>
                    @isset($provincias)
                    <select class="form-select form-control" id="provincia_id" name="provincia_id">
                        @foreach($provincias as $provincia)
                            <option value="{{$provincia->id}}">{{$provincia->prov_descricao}}</option>
                        @endforeach
                    </select>
                    @endisset
                </div>
                <div class="col-md-4">
                    <label for="municipio_id" class="form-label">
                        <i class="fa-solid fa-file-signature"></i>
                        <span>Municípios:</span>
                    </label>
                    <select class="form-select form-control" id="municipio_id" name="municipio_id">
                    </select>
                </div>
            </section>
            <h6 class="ml-3 mr-3 mt-2 border-bottom pb-2">Segurança</h6>
            <section class="row g-3 p-2">
                <div class="col-md-6">
                    <label for="seg_telefone" class="form-label">
                        <i class="fa-solid fa-phone"></i>
                        <span>Telefone(opcional):</span>
                    </label>
                    <input type="text" name="seg_telefone" id="seg_telefone" value="{{old('seg_telefone')}}" class="form-control" required/>
                </div>
                <div class="col-md-6">
                    <label for="seg_email" class="form-label">
                        <i class="fa-regular fa-at"></i>
                        <span>Email(opcional):</span>
                    </label>
                    <input type="email" name="seg_email" id="seg_email" value="{{old('seg_email')}}" class="form-control" id="nome_completo" required/>
                </div>
            </section>
            <h6 class="ml-3 mr-3 mt-2 border-bottom pb-2">Adicionais</h6>
            <section class="row g-3 p-2">
                <div class="col-md-6">
                    <label for="bi" class="form-label">
                        <i class="fa-solid fa-file"></i>
                        <span>Bi:</span>
                    </label>
                    <input type="text" name="bi" id="bi" value="{{old('bi')}}" class="form-control"  required/>
                </div>
                <div class="col-md-6">
                    <label for="estado_civil" class="form-label">
                        <i class="fa-solid fa-ring"></i>
                        <span>Estado Cívil:</span>
                    </label>
                    <select name="estado_civil" id="estado_civil" class="form-select form-control">
                        <option value="SOLTEIRO">Solteiro(a)</option>
                        <option value="CASADO">Casado(a)</option>
                    </select>
                </div>
            </section>
            <div class="p-2">
                <button type="submit" name="submit" class="btn btn-primary m-2">
                    <span>salvar</span>
                </button>
            </div>
        </form>
    </div>
    <div class="tab-pane fade" id="nav-formacao" role="tabpanel" aria-labelledby="nav-formacao-tab">
        <form action="#" class="border p-2 rounded" method="POST">
            @csrf
            <input type="hidden" name="user_id" value="{{Auth::user()->id}}"/>
            @include('fragments.error')
            <section class="row g-3 p-2">
                <div class="col-md-6">
                    <label for="curso" class="form-label">
                        <i class="fa-solid fa-file-signature"></i>
                        <span>Curso:</span>
                    </label>
                    <input type="text" name="curso" id="curso" class="form-control" required/>
                </div>
                <div class="col-md-6">
                    <label for="escola" class="form-label">
                        <i class="fa-solid fa-school"></i>
                        <span>Escola:</span>
                    </label>
                    <input type="text" name="escola" id="escola" class="form-control" required/>
                </div>
                <div class="col-md-6 mt-2">
                    <label for="pais" class="form-label">
                        <i class="fa-solid fa-flag"></i>
                        <span>Pais:</span>
                    </label>
                    <input type="text" name="pais" id="pais" class="form-control" required/>
                </div>
                <div class="col-md-6 mt-2">
                    <label for="estado" class="form-label">
                        <i class="fa-solid fa-earth-africa"></i>
                        <span>Estado:</span>
                    </label>
                    <input type="text" name="estado" id="estado" class="form-control" required/>
                </div>
                <div class="col-md-12 mt-2">
                    <label for="categoria" class="form-label">
                        <i class="fa-solid fa-list"></i>
                        <span>Categoria:</span>
                    </label>
                    <select name="categoria" id="categoria" class="form-select form-control">
                        <option value="BASE">Basé</option>
                        <option value="MEDIO">Médio</option>
                        <option value="TECNICO">Tecnico</option>
                        <option value="LICENCIATURA">Lincenciatura</option>
                        <option value="MESTRADO">Mestrado</option>
                        <option value="DOUTORAMENTO">Doutoramento</option>
                    </select>
                </div>
            </section>
            <div class="p-2">
                <button type="submit" class="btn btn-primary">salvar</button>
            </div>
        </form>
    </div>
    <div class="tab-pane fade" id="nav-senha" role="tabpanel" aria-labelledby="nav-senha-tab">
        <section class="container">
            <form method="POST" action="#" class="">
                @csrf
                @include('fragments.error')
              <section class="row g-3">
                <div class="col-md-6">
                   <label for="senha_antiga" class="form-label">
                       <i class="fa-solid fa-key"></i>
                       <span>Senha(antiga):</span>
                    </label>
                    <input type="password" name="senha_antiga" id="senha_antiga" value="" class="form-control" required/>
                </div>
                <div class="col-md-6">
                    <label for="confirma_antiga" class="form-label">
                        <i class="fa-solid fa-lock"></i>
                        <span>Confirma(antiga):</span>
                     </label>
                     <input type="password" name="confirma_antiga" id="confirma_antiga"  class="form-control" required/>
                 </div>
                 <div class="col-md-12 mt-2 mb-2">
                     <hr/>
                 </div>
                 <div class="col-md-6">
                    <label for="senha_nova" class="form-label">
                        <i class="fa-solid fa-key"></i>
                        <span>Senha(Nova):</span>
                     </label>
                     <input type="password" name="senha_nova" id="senha_nova" value="" class="form-control" required/>
                 </div>
                 <div class="col-md-6">
                     <label for="confirma_nova" class="form-label">
                        <i class="fa-solid fa-lock"></i>
                        <span>Confirma(Nova):</span>
                      </label>
                      <input type="password" name="confirma_nova" id="confirma_nova"  class="form-control" required/>
                  </div>

              </section>
               <div class="p-2">
                   <button type="submit" name="submit" class="btn btn-outline-warning m-2">
                       <i class="fa-solid fa-arrows-rotate"></i>
                       <span>Actualizar</span>
                   </button>
               </div>
           </form>
        </section>
    </div>
</div>

@endsection
@section('javascript-painel')
    <script src="{{asset('js/painel/conta.js')}}"></script>
    <script src="{{asset('js/register.js')}}"></script>
@endsection
