<div class="scroll">
<table class="table table-borderless" id="">
    <thead class="bg-primary text-monospace">
        <tr class="text-white text-center">
            <th>
                <a class="text-decoration-none text-white"  href="{{route('projecto.titulo',$titulo->projecto_id)}}"
                   data-toggle="tooltip" data-placement="bottom" title="voltar">
                    <i class="fa-solid fa-angles-left"></i>
                </a>
            </th>
            <th colspan="1">Subtitulos</th>
            <th colspan="3">Acção</th>
            <th>Prioridade</th>
        </tr>
    </thead>
    <tbody class="bg-white">
        @isset($subtitulos)
            @foreach($subtitulos as $subtitulo)
                <tr class="text-dark p-0 text-center">
                    <td class="min">
                        <input type="checkbox" class="form-check tema-check" name="" id="{{$subtitulo->id}}"/>
                    </td>
                    <td class="border-right border-left border-bottom">{{$subtitulo->descricao}}</td>
                    <td class="min">
                        <a href="{{route('conteudo.subtitulo.page',$subtitulo->id)}}" class="text-info text-decoration-none d-flex">
                            <i class="fa-solid fa-book mt-1 mr-2"></i>
                            <span>conteudo</span>
                        </a>
                    </td>
                    <td class="min">
                        <a href="{{route('subtitulo.page',$subtitulo->id)}}" value="{{$subtitulo->id}}" desc="{{$subtitulo->descricao}}" prec="{{$subtitulo->prioridade}}" class="text-warning text-decoration-none d-flex act" data-bs-toggle="modal" data-bs-target="#modal-actualizacao">
                            <i class="fa-solid fa-arrows-rotate mt-1 mr-2"></i>
                            <span>actuaização</span>
                        </a>
                    </td>
                    <td class="min">
                        <a href="{{route('subtitulo.page',$subtitulo->id)}}" value="{{$subtitulo->id}}" desc="{{$subtitulo->descricao}}" class="text-danger text-decoration-none d-flex act" data-bs-toggle="modal" data-bs-target="#modal-delete-tema">
                            <i class="fa-solid fa-close mt-1 mr-2"></i>
                            <span>apagar</span>
                        </a>
                    </td>
                    <td>{{$subtitulo->prioridade}}</td>
                </tr>
            @endforeach
        @endisset
    </tbody>
</table>
</div>
@isset($subtitulos)
@if( $subtitulos->lastPage() > 1)
<nav class="mt-2">
    <ul class="pagination pagination-sm">
        @if($subtitulos->currentPage() - 1 >= 1)
            <a class="page-link" href="{{route('subtitulo.page',$titulo->id)}}?page={{$subtitulos->currentPage()-1}}#table-titulo">
                <i class="fa-solid fa-angles-left"></i>
            </a>
        @else
            <a class="page-link" href="{{route('subtitulo.page',$titulo->id)}}?page={{$subtitulos->currentPage()}}#table-titulo">
                <i class="fa-solid fa-angles-left"></i>
            </a>
        @endif
        @for($i = 1; $i <= $subtitulos->lastPage(); $i++)
          <li class="page-item">
            @if($i == $subtitulos->currentPage())
                <a class="page-link active bg-primary text-white" href="{{route('subtitulo.page',$titulo->id)}}?page={{$i}}#table-titulo">{{$i}}</a>
            @else
                <a class="page-link" href="{{route('subtitulo.page',$titulo->id)}}?page={{$i}}#table-titulo">{{$i}}</a>
            @endif
          </li>
        @endfor
        @if($subtitulos->currentPage() + 1 < $subtitulos->lastPage())
            <a class="page-link" href="{{route('subtitulo.page',$titulo->id)}}?page={{$subtitulos->currentPage() + 1}}#table-titulo">
                <i class="fa-solid fa-angles-right"></i>
            </a>
        @else
            <a class="page-link" href="{{route('subtitulo.page',$titulo->id)}}?page={{$subtitulos->lastPage()}}#table-titulo">
                <i class="fa-solid fa-angles-right"></i>
            </a>
        @endif
    </ul>
</nav>
@endif
    @include('components.modal.update.subtitulo')
    @include('components.modal.delete.subtitulo')
@endisset
