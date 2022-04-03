<div class="modal fade" id="modal-titulo-up" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="modal-titulo-up-label" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header bg-dark">
                <h5 class="modal-title text-white" id="modal-titulo-up-label">
                      Titulo\actualização
                </h5>
                <a class="btn-close text-danger h3" data-bs-dismiss="modal" aria-label="Close">
                </a>
            </div>
            <div class="modal-body">
                <div class="input-group mb-3">
                    <label class="input-group-text bg-warning text-white" id="basic-addon1">
                        <i class="fa-solid fa-folder-tree"></i>
                        <span class="ml-2">titulo:</span>
                    </label>
                    <input type="text" class="form-control" id="up-descricao" value="" required/>
                </div>
                <div class="input-group mb-3">
                    <label class="input-group-text bg-warning text-white">
                        <i class="fa-solid fa-list-ol"></i>
                        <span class="ml-2">prior.:</span>
                    </label>
                    <input type="number" class="form-control" id="up-prioridade" min="0" value="0" required/>
                </div>
                <input type="hidden" name="" id="up-chave" />
                <input type="hidden" name="" id="up-id" />
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-danger" data-bs-dismiss="modal">cancelar</button>
                <button type="button" class="btn btn-primary" id="btn-up" value="titulo">actualização</button>
            </div>
        </div>
    </div>
</div>
