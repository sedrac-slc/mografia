@extends('layouts.painel')
@section('content-painel')
<section class="container">
@isset($temas)
  <div class="p-2 border">
    <form action="{{route('tema.view.projecto')}}" method="POST">
        @csrf
        <input type="hidden" name="redirect" value="projecto"/>
        <label for="tema_id" class="form-label">
            <i class="fa-solid fa-bars"></i>
            <span>Escolha o tema:</span>
        </label>
        <div class="input-group mb-3">
            <select class="form-control" name="tema_id" id="tema_id">
                @foreach($temas as $tema)
                    <option value="{{$tema->id}}">{{$tema->descricao}}</option>
                @endforeach
            </select>
            <button type="submit" class=" btn btn-primary" id="basic-addon2">avançar</button>
        </div>
    </form>
  </div>
  <hr/>
  @include('components.table.projecto')
@endisset
@endsection
@section('javascript-painel')
    <script src="{{asset('js/painel/projecto.js')}}"></script>
    <script src="{{asset('js/produto.formulario.js')}}"></script>
@endsection
