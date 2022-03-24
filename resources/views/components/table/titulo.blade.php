<table class="table table-borderless" id="">
    <thead class="bg-dark  text-monospace">
        <tr class="text-white">
            <th colspan="6">
                titulos
            </th>
        </tr>
    </thead>
    <tbodyclass="bg-light">
        @isset($titulos)
            @foreach($titulos as $titulo)
                <tr class="text-dark p-0">
                    <td class="min">
                        <input type="checkbox" class="form-check tema-check" name="" id="{{$titulo->id}}"/>
                    </td>
                    <td class="border-right border-left border-bottom">{{$titulo->descricao}}</td>
                    <td class="min">
                        <a href="{{route('conteudo.titulo.page',$titulo->id)}}" class="text-secondary text-decoration-none d-flex">
                            <i class="fa-solid fa-book mt-1 mr-2"></i>
                            <span>conteudo</span>
                        </a>
                    </td>
                    <td class="min">
                        <a href="{{route('subtitulo.page',$titulo->id)}}" class="text-primary text-decoration-none d-flex">
                            <i class="fa-solid fa-folder-tree mt-1 mr-2"></i>
                            <span>subtitulo</span>
                        </a>
                    </td>
                    <td class="min">
                        <a href="{{route('titulo.page',$tema->id)}}" value="{{$titulo->id}}" desc="{{$titulo->descricao}}" class="text-warning text-decoration-none d-flex act" data-bs-toggle="modal" data-bs-target="#modal-actualizacao">
                            <i class="fa-solid fa-folder-open mt-1 mr-2"></i>
                            <span>actuaização</span>
                        </a>
                    </td>
                    <td class="min">
                        <a href="{{route('titulo.page',$tema->id)}}" value="{{$titulo->id}}" desc="{{$titulo->descricao}}" class="text-danger text-decoration-none d-flex act" data-bs-toggle="modal" data-bs-target="#modal-delete-tema">
                            <i class="fa-solid fa-close mt-1 mr-2"></i>
                            <span>apagar</span>
                        </a>
                    </td>
                </tr>
            @endforeach
        @endisset
    </tbody>
</table>
@isset($titulos)
@if( $titulos->lastPage() > 1)
<nav>
    <ul class="pagination pagination-sm">
        @if($titulos->currentPage() - 1 >= 1)
            <a class="page-link" href="{{route('titulo.page',$tema->id)}}?page={{$titulos->currentPage()-1}}#table-titulo">
                <i class="fa-solid fa-angles-left"></i>
            </a>
        @else
            <a class="page-link" href="{{route('titulo.page',$tema->id)}}?page={{$titulos->currentPage()}}#table-titulo">
                <i class="fa-solid fa-angles-left"></i>
            </a>
        @endif
        @for($i = 1; $i <= $titulos->lastPage(); $i++)
          <li class="page-item">
            @if($i == $titulos->currentPage())
                <a class="page-link active bg-primary text-white" href="{{route('titulo.page',$tema->id)}}?page={{$i}}#table-titulo">{{$i}}</a>
            @else
                <a class="page-link" href="{{route('titulo.page',$tema->id)}}?page={{$i}}#table-titulo">{{$i}}</a>
            @endif
          </li>
        @endfor
        @if($titulos->currentPage() + 1 < $titulos->lastPage())
            <a class="page-link" href="{{route('titulo.page',$tema->id)}}?page={{$titulos->currentPage() + 1}}#table-titulo">
                <i class="fa-solid fa-angles-right"></i>
            </a>
        @else
            <a class="page-link" href="{{route('titulo.page',$tema->id)}}?page={{$titulos->lastPage()}}#table-titulo">
                <i class="fa-solid fa-angles-right"></i>
            </a>
        @endif
    </ul>
</nav>
@endif
    @include('components.modal.update.titulo')
    @include('components.modal.delete.titulo')
@endisset
