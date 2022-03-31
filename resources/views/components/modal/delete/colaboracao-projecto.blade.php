<div class="modal fade" id="modal-delete-colaboracao" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="modal-delete-colaboracao-label" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header bg-dark">
                    <h5 class="modal-title text-white" id="modal-delete-colaboracao-label">
                          Colaboração\apagar
                    </h5>
                    <a class="btn-close text-danger h3" data-bs-dismiss="modal" aria-label="Close">
                    </a>
                </div>
                <form action="{{route('colaboracao.delete')}}" method="POST">
                    @csrf
                    @method('DELETE')
                    <input type="hidden" name="id" class="id" value=""/>
                    <input type="hidden" name="projecto_id" class="projecto_id" value=""/>
                    <input type="hidden" name="colaborador_id" class="colaborador_id" value=""/>
                    <div class="modal-body text-center">
                        <div class="m-auto">
                            <div class="">
                                <i class="fa-solid fa-info fa-4x p-4"></i>
                            </div>
                            <div class="mt-2 text-">
                                <p>Queres apagar esta colaboração?</p>
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
