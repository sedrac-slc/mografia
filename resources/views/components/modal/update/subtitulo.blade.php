<div class="modal fade" id="modal-actualizacao" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="modal-actualizacao-label" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header bg-dark">
                <h5 class="modal-title text-white" id="modal-actualizacao-label">
                      Subtitulo\actualização
                </h5>
                <a class="btn-close text-danger h3" data-bs-dismiss="modal" aria-label="Close">
                </a>
            </div>
            <form action="{{route('subtitulo.update',$titulo->id)}}" method="POST">
                @csrf
                @method('PUT')
                <div class="modal-body">
                    <input type="hidden" name="user_id" value="{{Auth::user()->id}}"/>
                    <input type="hidden" class="cls" name="id" value=""/>
                    <input type="hidden" name="titulo_id" value="{{$titulo->id}}"/>
                    <div class="input-group mb-3">
                        <label class="input-group-text bg-warning text-white" id="basic-addon1">
                            <i class="fa-solid fa-folder-open"></i>
                            <span class="ml-2">Subtitulo:</span>
                        </label>
                        <input type="text" class="form-control desc" name="sub_descricao" value="" aria-describedby="basic-addon1" required/>
                    </div>
                </div>
                <div class="modal-footer">
                     <button type="button" class="btn btn-danger" data-bs-dismiss="modal">cancelar</button>
                     <button type="submit" class="btn btn-primary">salvar</button>
                </div>
            </form>
        </div>
    </div>
</div>
