<div class="scroll">
<table class="table table-borderless" id="table-tema">
    <thead class="bg-primary text-monospace">
        <tr class="text-white text-center">
            <th colspan="2">
                Tema
            </th>
            <th colspan="3">
                Acção
            </th>
        </tr>
    </thead>
    <tbody class="bg-white">
        @isset($temas)
            @foreach($temas as $tema)
                <tr class="text-dark p-0">
                    <td class="min">
                        <input type="checkbox" class="form-check tema-check" name="" id="{{$tema->id}}"/>
                    </td>
                    <td class="border-right border-left border-bottom">{{$tema->descricao}}</td>
                    <td class="min">
                        <a href="{{route('projecto.page',$tema->id)}}" class="text-info text-decoration-none d-flex" id="url-projecto">
                            <i class="fa-solid fa-folder-open mt-1 mr-2"></i>
                            <span>projecto</span>
                        </a>
                    </td>
                    <td class="min">
                        <a href="#" value="{{$tema->id}}" descricao="{{$tema->descricao}}" class="text-warning text-decoration-none d-flex tema-act" data-bs-toggle="modal" data-bs-target="#modal-actualizacao">
                            <i class="fa-solid fa-arrows-rotate mt-1 mr-2"></i>
                            <span>actuaização</span>
                        </a>
                    </td>
                    <td class="min">
                        <a href="#" value="{{$tema->id}}" descricao="{{$tema->descricao}}" class="text-danger text-decoration-none d-flex tema-act" data-bs-toggle="modal" data-bs-target="#modal-delete-tema">
                            <i class="fa-solid fa-close mt-1 mr-2"></i>
                            <span>apagar</span>
                        </a>
                    </td>
                </tr>
            @endforeach
        @endisset
    </tbody>
</table>
@isset($temas)
@if( $temas->lastPage() > 1)
<nav>
    <ul class="pagination pagination-sm">
        @if($temas->currentPage() - 1 >= 1)
            <a class="page-link" href="?page={{$temas->currentPage() - 1}}#table-tema">
                <i class="fa-solid fa-angles-left"></i>
            </a>
        @else
            <a class="page-link" href="?page={{$temas->currentPage()}}#table-tema">
                <i class="fa-solid fa-angles-left"></i>
            </a>
        @endif
        @for($i = 1; $i <= $temas->lastPage(); $i++)
          <li class="page-item">
            @if($i == $temas->currentPage())
                <a class="page-link active bg-primary text-white" href="?page={{$i}}#table-tema">{{$i}}</a>
            @else
                <a class="page-link" href="?page={{$i}}#table-tema">{{$i}}</a>
            @endif
          </li>
        @endfor
        @if($temas->currentPage() + 1 < $temas->lastPage())
            <a class="page-link" href="?page={{$temas->currentPage() + 1}}#table-tema">
                <i class="fa-solid fa-angles-right"></i>
            </a>
        @else
            <a class="page-link" href="?page={{$temas->lastPage()}}#table-tema">
                <i class="fa-solid fa-angles-right"></i>
            </a>
        @endif
    </ul>
</nav>
</div>
@endif
    @include('components.modal.update.tema')
    @include('components.modal.delete.tema')
@endisset
