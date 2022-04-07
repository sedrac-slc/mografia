
function links(conteudo){
    return `<div class="d-flex text-center mt-1 pt-2 parg-control d-none ml-5 border-bottom">
        <a href="#" class="text-primary text-decoration-none cursor-pointer" data-toggle="tooltip" data-placement="left" title="oculta">
            <i class="fa-solid fa-eye"></i>
        </a>
        <a class="ml-2 text-danger text-decoration-none cursor-pointer ml-3" data-toggle="tooltip" data-placement="left" title="eliminar"
        onclick="eliminar(${conteudo.id})">
            <i class="fa-solid fa-close"></i>
        </a>
        <a class="ml-2 text-info text-decoration-none cursor-pointer ml-3" data-toggle="tooltip" data-placement="left" title="actualizar" id="parg-act-${conteudo.id}"
         descricao="${conteudo.descricao}" prioridade="${conteudo.prioridade}" conteudo-tipo="${conteudo.conteudo_tipo_id}" nome="${conteudo.nome}"
         onclick="actualizar(${conteudo.id})">
            <i class="fa-solid fa-pencil"></i>
        </a>
        <a href="#" class="ml-2 text-success text-decoration-none cursor-pointer ml-3" data-toggle="tooltip" data-placement="left" title="compartilha">
            <i class="fa-solid fa-share"></i>
        </a>
    </div>`;
}

function parg(conteudo){
    return `<div class="parg bg-white mt-2" id="parg-conteudo-${conteudo.id}">
        <div class="p-1 ml-2 mr-2 d-block">`
        +links(conteudo)+
          `<div class="parg-descricao mb-1 text-justify text-indent text-overflow-ellipsis" id="parg-descricao">
                ${conteudo.descricao}
            </div>
        </div>
    </div>`;
}

