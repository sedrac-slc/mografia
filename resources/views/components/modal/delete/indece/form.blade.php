<div class="modal fade" id="modal-delete-titulo" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="modal-delete-titulo-label" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header bg-dark">
                    <h5 class="modal-title text-white" id="modal-delete-titulo-label" id="titulo-acao">
                    </h5>
                    <a class="btn-close text-danger h3" data-bs-dismiss="modal" aria-label="Close">
                    </a>
                </div>
                <div class="modal-body text-center">
                    <div class="m-auto">
                        <div class="">
                            <i class="fa-solid fa-info fa-3x p-3"></i>
                        </div>
                         <div class="mt-2 input-group d-flex">
                            <input type="text" class="form-control w-75" name="" id="del-descricao" value="" readonly/>
                            <input type="text" class="form-control ml-2" name="" id="del-prioridade" value="" readonly/>
                        </div>
                        <input type="hidden" name="" id="del-id"/>
                    </div>
                    <div class="modal-footer">
                         <button type="button" class="btn btn-danger" data-bs-dismiss="modal">cancelar</button>
                         <button type="submit" class="btn btn-success" id="btn-del" value="titulo">
                             <i class="fa-solid fa-ok"> </i>
                             <span>confirma</span>
                        </button>
                    </div>
            </div>
        </div>
    </div>
</div>
