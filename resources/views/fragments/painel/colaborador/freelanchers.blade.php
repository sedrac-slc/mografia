@extends('layouts.default')
@section('bg-body','class=bg-primary')
@section('content')
@include('components.insert.nav-painel')
<section class="m-auto w-75 p-2">
    <form action="{{route('projecto.create')}}" class="border p-2 rounded mt-5 bg-white" method="POST">
        @csrf
        @include('fragments.error')
        <h5 class="ml-2">Email</h5>
        <hr/>
        <input type="hidden" name="projecto_id" value="{{$projecto->id}}"/>
        <div class="input-group mb-3 mt-3">
            <span class="input-group-text" id="basic-addon1">@</span>
            <input type="email" class="form-control" placeholder="email"/>
          </div>
        <div class="mb-3">
            <button type="submit" class="btn btn-primary">colaboração</button>
        </div>
    </form>
</section>
@endsection
