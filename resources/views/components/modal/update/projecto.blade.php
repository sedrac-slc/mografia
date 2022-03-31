<div class="modal fade" id="modal-actualizacao" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="modal-actualizacao-label" aria-hidden="true">
    <div class="modal-dialog modal-fullscreen">
        <div class="modal-content">
            <div class="modal-header bg-dark">
                <h5 class="modal-title text-white" id="modal-actualizacao-label">
                      Projecto\actualização
                </h5>
                <a class="btn-close text-danger h3" data-bs-dismiss="modal" aria-label="Close">
                </a>
            </div>
            <form action="{{route('projecto.update')}}" method="POST" class="bg-white">
                @csrf
                @method('PUT')
                <div class="modal-body">
                    @csrf
                    <input type="hidden" name="id" class="id" id="" value=""/>
                    <input type="hidden" name="user_id" value="{{Auth::user()->id}}"/>
                    @include('fragments.error')
                    <div class="col-md-12 mt-2 d-none" id="data_err">
                        <div class="alert alert-danger alert-dismissible fade show" role="alert">
                                A data de inicio não pode ser maior que a data de fim ou de entrega.
                            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                        </div>
                    </div>
                    <section class="row g-3 p-2">
                      <div class="col-md-4">
                        <label for="tema_id" class="form-label">
                            <i class="fa-solid fa-list"></i>
                            <span>Escolha o tema:</span>
                        </label>
                        <select class="form-control tema" name="tema_id" id="">
                          @foreach($temas as $tema)
                            <option value="{{$tema->id}}">{{$tema->descricao}}</option>
                          @endforeach
                        </select>
                      </div>
                      <div class="col-md-4">
                         <label for="nome" class="form-label">
                            <i class="fa-solid fa-file-signature"></i>
                            <span>Nome projecto:</span>
                          </label>
                          <input type="text" name="nome" value="{{old('nome')}}" class="form-control nome"  required/>
                      </div>
                      <div class="col-md-4">
                            <label for="orcamento" class="form-label">
                               <i class="fa-solid fa-file-signature"></i>
                               <span>orcamento:</span>
                             </label>
                             <input type="number" name="orcamento" value="{{old('orcamento')}}" class="form-control orcamento"  required/>
                      </div>
                      <div class="col-md-3 mt-2">
                        <label for="acesso" class="form-label">
                            <i class="fa-solid fa-universal-access"></i>
                            <span>Acesso:</span>
                        </label>
                        <select name="acesso" class="form-select form-control acesso" id="acesso">
                            <option value="PUBLICO">Público</option>
                            <option value="PRIVADO">Privado</option>
                            <option value="PROTEGIDO">Protegido</option>
                        </select>
                      </div>
                      <div class="col-md-3 mt-2">
                        <label for="tipo" class="form-label">
                                <i class="fa-solid fa-folder-tree"></i>
                                <span>Tipo:</span>
                        </label>
                        <select name="tipo" class="form-select form-control tipo" id="tipo">
                            @foreach($listTipo as $tipo)
                               <option value="{{$tipo->getCodigo()}}">{{$tipo->getDescricao()}}</option>
                            @endforeach
                        </select>
                      </div>
                      <div class="col-md-3 mt-2">
                        <label for="data_inicio" class="form-label">
                            <i class="fa-solid fa-calendar-check"></i>
                            <span>Data inicio:</span>
                        </label>
                        <input class="form-control data_inicio" type="date" name="data_inicio" id=""/>
                      </div>
                      <div class="col-md-3 mt-2">
                          <label for="data_fim" class="form-label">
                             <i class="fa-solid fa-calendar-day"></i>
                             <span>Data fim:</span>
                          </label>
                          <input class="form-control data_fim" type="date" name="data_fim" id=""/>
                       </div>
                       <div class="col-md-12 mt-2">
                            <label for="descricao" class="form-label">
                                <i class="fa-solid fa-message"></i>
                                <span class="ml-3">Descrição</span>
                            </label>
                            <textarea class="form-control descricao" value="" id="" name="pro_descricao"></textarea>
                        </div>
                    </section>
                </div>
                <div class="modal-footer">
                     <button type="button" class="btn btn-danger" data-bs-dismiss="modal">cancelar</button>
                     <button type="submit" class="btn btn-primary">actualizar</button>
                </div>
            </form>
        </div>
    </div>
</div>
