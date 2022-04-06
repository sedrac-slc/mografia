
function form(){
    return `
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
    </form>`;
}

function links(){
    return `
    <div class="d-flex text-center mb-2 mt-1 border-top pt-2 parg-control">
        <a href="#" class="text-primary text-decoration-none">
            <i class="fa-solid fa-eye"></i>
            <span>oculta</span>
        </a>
        <a href="#" class="ml-2 text-danger text-decoration-none">
            <i class="fa-solid fa-close"></i>
            <span>eliminar</span>
        </a>
        <a href="#" class="ml-2 text-info text-decoration-none">
            <i class="fa-solid fa-pencil"></i>
            <span>actualização</span>
        </a>
        <a href="#" class="ml-2 text-success text-decoration-none">
            <i class="fa-solid fa-share"></i>
            <span>compartilha</span>
        </a>
    </div>`;
}

function parg(id,descricao){
    return `
    <div class="parg bg-white mt-2" id="parg-`+id+`">
        <div class="p-1 ml-2 mr-2 d-block">
            <div class="parg-descricao mb-1 text-justify text-indent text-overflow-ellipsis" id="parg-descricao">`
              +descricao+
            `</div>`
             +links()+
        `</div>
    </div>`;
}
