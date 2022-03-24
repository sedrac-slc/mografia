<div style="overflow-x:auto;" class="scroll">
<table class="table table-borderless" id="">
    <thead class="bg-dark  text-monospace">
        <tr class="text-white">
            <th colspan="2" class="text-center">Nome</th>
            <th colspan="2" class="text-center">Acção</th>
            <th>Tema</th>
            <th>Acesso</th>
            <th>Tipo</th>
        </tr>
    </thead>
    <tbodyclass="bg-light">
        @isset($projectos)
            @foreach($projectos as $projecto)
                <tr class="text-dark p-0">
                    <td class="min">
                        <input type="checkbox" class="form-check tema-check" name="" id="{{$projecto->id}}"/>
                    </td>
                    <td class="border-right border-left border-bottom">{{$projecto->nome}}</td>
                    <td class="min">
                        <a href="#" class="text-warning text-decoration-none d-flex act" data-bs-toggle="modal" data-bs-target="#modal-actualizacao"
                                    pro-id="{{$projecto->id}}" nome="{{$projecto->nome}}"
                                    data-inicio="{{$projecto->data_inicio}}"
                                    data-fim="{{$projecto->data_fim}}"
                                    pro-desc="{{$projecto->pro_descricao}}">
                            <i class="fa-solid fa-arrows-rotate mt-1 mr-2"></i>
                            <span>actuaização</span>
                        </a>
                    </td>
                    <td class="min">
                        <a href="{{route('projecto.page',$projecto->id)}}" class="text-danger text-decoration-none d-flex den" data-bs-toggle="modal" data-bs-target="#modal-delete-projecto"
                            pro-id="{{$projecto->id}}" nome="{{$projecto->nome}}">
                            <i class="fa-solid fa-close mt-1 mr-2"></i>
                            <span>apagar</span>
                        </a>
                    </td>
                    <td class="">{{$projecto->descricao}}</td>
                    <td class="min">{{$projecto->acesso}}</td>
                    <td class="min">{{$projecto->tipo}}</td>
                </tr>
            @endforeach
        @endisset
    </tbody>
</table>
</div>
@isset($projectos)
@if( $projectos->lastPage() > 1)
<!--
<nav>
    <ul class="pagination pagination-sm">
        @if($projectos->currentPage() - 1 >= 1)
            <a class="page-link" href=#?page={{$projectos->currentPage()-1}}#table-titulo">
                <i class="fa-solid fa-angles-left"></i>
            </a>
        @else
            <a class="page-link" href=#?page={{$projectos->currentPage()}}#table-titulo">
                <i class="fa-solid fa-angles-left"></i>
            </a>
        @endif
        @for($i = 1; $i <= $projectos->lastPage(); $i++)
          <li class="page-item">
            @if($i == $projectos->currentPage())
                <a class="page-link active bg-primary text-white" href=#?page={{$i}}#table-titulo">{{$i}}</a>
            @else
                <a class="page-link" href=#?page={{$i}}#table-titulo">{{$i}}</a>
            @endif
          </li>
        @endfor
        @if($projectos->currentPage() + 1 < $projectos->lastPage())
            <a class="page-link" href=#?page={{$projectos->currentPage() + 1}}#table-titulo">
                <i class="fa-solid fa-angles-right"></i>
            </a>
        @else
            <a class="page-link" href=#?page={{$projectos->lastPage()}}#table-titulo">
                <i class="fa-solid fa-angles-right"></i>
            </a>
        @endif
    </ul>
</nav>
-->
@endif
    @include('components.modal.update.projecto')
    @include('components.modal.delete.projecto')
@endisset
