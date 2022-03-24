<div class="modal fade" id="modal-delete-projecto" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="modal-delete-projecto-label" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header bg-dark">
                    <h5 class="modal-title text-white" id="modal-delete-projecto-label">
                        Projecto\apagar
                    </h5>
                    <a class="btn-close text-danger h3" data-bs-dismiss="modal" aria-label="Close">
                    </a>
                </div>
                <form action="{{route('projecto.delete')}}" method="POST">
                    @csrf
                    @method('DELETE')
                    <div class="modal-body text-center">
                        <input type="hidden" name="id" class="id-den" id="" value=""/>
                        <div class="m-auto">
                            <div class="">
                                <i class="fa-solid fa-info fa-4x p-4"></i>
                            </div>
                            <div class="mt-2 text-">
                                <p>Queres apagar o subtitulo?</p>
                                <input class="form-control nome-den" style="text-align: center;" type="text"  disabled>
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
