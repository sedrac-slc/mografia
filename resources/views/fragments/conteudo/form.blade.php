<form class="row g-3">
    <div class="col-md-5 mt-1">
        <input type="text" class="form-control parg-nome" name="nome" id="parg-nome" placeholder="nome do paragrafós"/>
    </div>
    <div class="col-md-5 mt-1">
        <select name="conteudo" id="parg-conteudo" class="form-control parg-conteudo">
            <option value="CONCEITO">Conceito</option>
            <option value="HISTORIA">História</option>
            <option value="BIBLIOGRAFIA">Bibliográfia</option>
            <option value="PERCURSOR">Percursor</option>
            <option value="GERAL" selected>Geral</option>
            <option value="IMPORTANCIA">Importância</option>
        </select>
    </div>
    <div class="col-md-2 mt-1">
        <input type="number" class="form-control parg-prioridade" name="prioridade" min="0" value="0" id="parg-prioridade"/>
    </div>
</form>
