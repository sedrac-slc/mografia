<div class="scroll">
<table class="table table-borderless" id="table-titulo">
    <thead class="bg-primary text-monospace">
        <tr class="text-white text-center">
            <th class="bg-white">
                <a class="text-decoration-none text-danger"  href="{{route('painel.page',$redirect)}}" data-toggle="tooltip" data-placement="bottom" title="voltar">
                    <i class="fa-solid fa-angles-left"></i>
                </a>
            </th>
            <th colspan="1">
                Titulos
            </th>
            <th colspan="4">Acção</th>
            <th>Propriedade</th>
        </tr>
    </thead>
    <tbody class="bg-white">
        @isset($titulos)
            @foreach($titulos as $titulo)
                <tr class="text-dark p-0 text-center">
                    <td class="min">
                        <input type="checkbox" class="form-check tema-check" name="" id="{{$titulo->id}}"/>
                    </td>
                    <td class="border-right border-left border-bottom">{{$titulo->descricao}}</td>
                    <td class="min">
                        <a href="{{route('conteudo.titulo.page',$titulo->id)}}" class="text-info text-decoration-none d-flex">
                            <i class="fa-solid fa-book mt-1 mr-2"></i>
                            <span>conteudo</span>
                        </a>
                    </td>
                    <td class="min">
                        <a href="{{route('titulo.subtitulo',$titulo->id)}}" class="text-primary text-decoration-none d-flex tit">
                            <i class="fa-solid fa-folder-tree mt-1 mr-2"></i>
                            <span>subtítulo</span>
                        </a>
                    </td>
                    <td class="min">
                        <a href="#" value="{{$titulo->id}}" desc="{{$titulo->descricao}}" prec="{{$titulo->prioridade}}" class="text-warning text-decoration-none d-flex act" data-bs-toggle="modal" data-bs-target="#modal-actualizacao">
                            <i class="fa-solid fa-arrows-rotate mt-1 mr-2"></i>
                            <span>actuaização</span>
                        </a>
                    </td>
                    <td class="min">
                        <a href="#" value="{{$titulo->id}}" desc="{{$titulo->descricao}}" class="text-danger text-decoration-none d-flex act" data-bs-toggle="modal" data-bs-target="#modal-delete-tema">
                            <i class="fa-solid fa-close mt-1 mr-2"></i>
                            <span>apagar</span>
                        </a>
                    </td>
                    <td>{{$titulo->prioridade}}</td>
                </tr>
            @endforeach
        @endisset
    </tbody>
</table>
</div>
@isset($titulos)
@if( $titulos->lastPage() > 1)
<nav class="mt-1">
    <ul class="pagination pagination-sm">
        @if($titulos->currentPage() - 1 >= 1)
            <a class="page-link" href="{{route('projecto.titulo',$projecto->id)}}?page={{$titulos->currentPage()-1}}#table-titulo">
                <i class="fa-solid fa-angles-left"></i>
            </a>
        @else
            <a class="page-link" href="{{route('projecto.titulo',$projecto->id)}}?page={{$titulos->currentPage()}}#table-titulo">
                <i class="fa-solid fa-angles-left"></i>
            </a>
        @endif
        @for($i = 1; $i <= $titulos->lastPage(); $i++)
          <li class="page-item">
            @if($i == $titulos->currentPage())
                <a class="page-link active bg-primary text-white" href="{{route('projecto.titulo',$projecto->id)}}?page={{$i}}#table-titulo">{{$i}}</a>
            @else
                <a class="page-link" href="{{route('projecto.titulo',$projecto->id)}}?page={{$i}}#table-titulo">{{$i}}</a>
            @endif
          </li>
        @endfor
        @if($titulos->currentPage() + 1 < $titulos->lastPage())
            <a class="page-link" href="{{route('projecto.titulo',$projecto->id)}}?page={{$titulos->currentPage() + 1}}#table-titulo">
                <i class="fa-solid fa-angles-right"></i>
            </a>
        @else
            <a class="page-link" href="{{route('projecto.titulo',$projecto->id)}}?page={{$titulos->lastPage()}}#table-titulo">
                <i class="fa-solid fa-angles-right"></i>
            </a>
        @endif
    </ul>
</nav>
@endif
    @include('components.modal.update.titulo')
    @include('components.modal.delete.titulo')
@endisset
