@extends('layouts.default')
@section('content')
<nav class="navbar navbar-expand-lg navbar-danger bg-danger mb-5">
    <div class="container-fluid">

      <a class="navbar-brand text-white" href="#">mografia\error</a>
    </div>
</nav>
<section class="container mt-3">
    @isset($message,$descricao,$redirect)
    <div class="m-auto w-50 p-5 border rounded bg-danger text-monospace">
        <div class="text-center bg-white rounded p-2 h4 mt-1">Mesagem</div>
        <div class="bg-white p-3 rounded text-center mt-3">
          <div class="text-justfy">{{$message}}</div>
          <div class="text-danger">[ {{$descricao}} ]</div>
        </div>
        <div class="mt-4">
            <a href="{{route('painel.page',$redirect)}}" class="text-decoration-none">
                <span class="bg-white p-2 text-danger rounded-circle">
                    <i class="fa-solid fa-angles-left ml-2"></i>
                </span>
                <span class="text-white ml-2">volta</span>
            </a>
        </div>
    </div>
    @endisset

    @isset($message,$descricao,$routa,$param)
    <div class="m-auto w-50 p-5 border rounded bg-danger text-monospace">
        <div class="text-center bg-white rounded p-2 h4 mt-1">Mesagem</div>
        <div class="bg-white p-3 rounded text-center mt-3">
          <div class="text-justfy">{{$message}}</div>
          <div class="text-danger">[ {{$descricao}} ]</div>
        </div>
        <div class="mt-4">
            <a href="{{route($routa,$param)}}" class="text-decoration-none">
                <span class="bg-white p-2 text-danger rounded-circle">
                    <i class="fa-solid fa-angles-left ml-2"></i>
                </span>
                <span class="text-white ml-2">volta</span>
            </a>
        </div>
    </div>
    @endisset

    @isset($message,$descricao,$back)
    <div class="m-auto w-50 p-5 border rounded bg-danger text-monospace">
        <div class="text-center bg-white rounded p-2 h4 mt-1">Mesagem</div>
        <div class="bg-white p-3 rounded text-center mt-3">
          <div class="text-justfy">{{$message}}</div>
          <div class="text-danger">[ {{$descricao}} ]</div>
        </div>
        <div class="mt-4">
            <a href="{{route($back)}}" class="text-decoration-none">
                <span class="bg-white p-2 text-danger rounded-circle">
                    <i class="fa-solid fa-angles-left ml-2"></i>
                </span>
                <span class="text-white ml-2">volta</span>
            </a>
        </div>
    </div>
    @endisset

</section>
@endsection
