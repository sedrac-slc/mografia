<div class="modal fade" id="modal-projecto-by-tema" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="modal-projecto-by-tema-label" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header bg-dark">
                <h5 class="modal-title text-white" id="modal-projecto-by-tema-label">
                    Escolha o projecto
                </h5>
                <a class="btn-close text-danger h3" data-bs-dismiss="modal" aria-label="Close">
                </a>
            </div>
            <form action="{{route('projecto.titulo')}}" method="POST">
                @csrf
                <div class="modal-body text-center" >
                    <div class="m-auto">
                        <input type="hidden" name="tema_id" class="id-den" id="tema_id_projecto" value=""/>
                        <div class="input-group mb-3 view d-none">
                            <label class="input-group-text bg-warning text-white" id="basic-addon1">
                                <i class="fa-solid fa-folder-open"></i>
                                <span class="ml-2">Projecto:</span>
                            </label>
                            <select name="projecto_id" id="projecto-tema" class="form-select form-control">
                            </select>
                        </div>
                        <div class="oculta d-none mt-3 mb-3">
                            <a href="" class="text-decoration-none h3 border rounded p-3" id="url-create">
                                <i class="fa-solid fa-folder-open"></i>
                                <span>criar projecto</span>
                            </a>
                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                     <button type="button" class="btn btn-danger" data-bs-dismiss="modal">cancelar</button>
                     <button type="submit" class="btn btn-success">
                         <i class="fa-solid fa-ok"> </i>
                         <span>confirma</span>
                    </button>
                </div>
            </form>
        </div>
    </div>
</div>
