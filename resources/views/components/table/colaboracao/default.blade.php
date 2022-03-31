<table class="table table-borderless" id="table-projecto">
    <thead class="bg-primary  text-monospace">
        <tr class="text-white text-center">
            <th class="">Nome</th>
            <th class="">Tema</th>
            <th class="">Dono</th>
            <th class="">Orçamento</th>
            <th class="" colspan="2">Acção</th>
        </tr>
    </thead>
    <tbody class="bg-light">
    @isset($projectosColaboracao)
        @foreach($projectosColaboracao as $projecto)
            <tr>
                <td class="text-center">{{$projecto->nome}}</td>
                <td class="text-center">{{$projecto->descricao}}</td>
                <td class="text-center">{{$projecto->name}}</td>
                <td class="text-center">{{$projecto->orcamento}}</td>
                <td class="min">
                    <a href="{{route('projecto.titulo',$projecto->projecto_id)}}" class="text-primary text-decoration-none d-flex tit">
                        <i class="fa-solid fa-folder-tree mt-1 mr-2"></i>
                        <span>título</span>
                    </a>
                </td>
                <td class="min">
                    <a href="#" value="{{$projecto->id}}" projecto="{{$projecto->projecto_id}}" colaborador={{$colaborador->id}} class="text-danger text-decoration-none d-flex den" data-bs-toggle="modal" data-bs-target="#modal-delete-colaboracao">
                        <i class="fa-solid fa-close mt-1 mr-2"></i>
                        <span>apagar</span>
                    </a>
                </td>
            </tr>
        @endforeach
    @endisset
    </tbody>
</table>
@include('components.modal.delete.colaboracao-projecto')
