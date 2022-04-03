var contadorSubtitulo = 0;

function buildDivSubtitulo(titulo,subtitulo){
    return `<div class="mt-1 subtitulo-div-${titulo}" id="subtitulo-${subtitulo.id}">
    <div class="d-flex">
        <a class="btn btn-danger text-white text-decoration-none mr-1" id="btn-sub-del-${subtitulo.id}" data-toggle="tooltip" data-placement="bottom" title="eliminar"
        onmouseover="eliminarSubTitulo(${subtitulo.id})" descricao="${subtitulo.descricao}" prioridade="${subtitulo.prioridade}"
        data-bs-toggle="modal" data-bs-target="#modal-delete-titulo">
            <i class="fa fa-close"></i>
        </a>
        <a href="#" class="btn btn-warning text-white text-decoration-none mr-1" id="btn-sub-up-${subtitulo.id}" data-toggle="tooltip" data-placement="bottom" title="actualizar"
        onmouseover="actualizarSubtitulo(${subtitulo.id})"  descricao="${subtitulo.descricao}" prioridade="${subtitulo.prioridade}" titulo_id="${subtitulo.titulo_id}"
        data-bs-toggle="modal" data-bs-target="#modal-titulo-up">
            <i class="fa fa-arrows-rotate"></i>
        </a>
        <a href="#" class="btn btn-info text-white text-decoration-none mr-1 d-none" data-toggle="tooltip" data-placement="bottom" title="${subtitulo.prioridade}">
            <i class="fa fa-eye"></i>
        </a>
        <input class="form-control sub-conteudo-${titulo} w-75" id="input-sub-descricao-${subtitulo.id}" value="${subtitulo.descricao}" readonly/>
        <input class="form-control w-25" id="input-sub-prioridade-${subtitulo.id}" value="${subtitulo.prioridade}" readonly/>
    </div>
</div>`;
}

function divSubtitulo(titulo){
    const painel = $('#subtitulo-lista-'+titulo);
    const params = {
        _token : $('#formulario-titulo > [name="_token"]').val(),
        id: contadorSubtitulo,
        titulo_id: titulo,
        descricao: $('#up-sub-descricao-'+titulo).val(),
        prioridade: $('#up-sub-prioridade-'+titulo).val()
    }
    var find = false;
    const subConteudo = $('.sub-conteudo-'+titulo);
    subConteudo.each(index=>{ if(subConteudo[index].value == params.descricao) find = true; });
    if(!find){
        const url = $('#url-add-subtitulo').val();
        if(params.descricao.length > 0){
            $.post(url, params, function(response){
                if(response != null){
                   painel.append(buildDivSubtitulo(titulo,response));
                  contadorSubtitulo++;
                }
            }).fail(function() {
                alert('não consegui');
            });
        }
    }else alert('subtitulo já existe ['+params.descricao+'].');

}

function formSubtitulo(titulo){
    return `<section class="d-flex mt-1 d-none" id="subtitulo-projecto-${titulo.id}">
    <div class="mr-2 w-75">
        <div class="input-group">
            <span class="input-group-text" id="">subtitulo</span>
            <input class="form-control" type="text" name="descricao" id="up-sub-descricao-${titulo.id}" autocomplete="none" required/>
        </div>
    </div>
    <div class="mr-2">
        <div class="input-group">
            <span class="input-group-text" id="">prioridade</span>
            <input class="form-control" type="number" name="prioridade" id="up-sub-prioridade-${titulo.id}" min="0" value="0" autocomplete="none" required/>
        </div>
    </div>
    <div class="d-flex">
        <button class="btn btn-primary" onclick="divSubtitulo(${titulo.id})">
            <span class="d-flex">
                <i class="fa-solid fa-plus mt-1"></i>
                <span class="ml-1">add</span>
            </span>
        </button>
    </div>
    </section>`;
}

function divTitulo(titulo){
    return `<div class="mt-2" id="titulo-${titulo.id}">
    <div class="d-flex">
       <a class="btn btn-primary text-white text-decoration-none mr-1" id="subtitulo-open" data-toggle="tooltip" data-placement="bottom" title="subtitulo"
       onclick="ocultarSubtitulo(${titulo.id})">
            <i class="fa fa-folder-tree"></i>
        </a>
        <a class="btn btn-danger text-white text-decoration-none mr-1" id="btn-tit-del-${titulo.id}" data-toggle="tooltip" data-placement="bottom" title="eliminar"
        onmouseover="eliminarTitulo(${titulo.id})" descricao="${titulo.descricao}" prioridade="${titulo.prioridade}"
        data-bs-toggle="modal" data-bs-target="#modal-delete-titulo">
            <i class="fa fa-close"></i>
        </a>
        <a class="btn btn-warning text-white text-decoration-none mr-1" id="btn-tit-up-${titulo.id}" data-toggle="tooltip" data-placement="bottom" title="actualizar"
        onmouseover="actualizarTitulo(${titulo.id})" descricao="${titulo.descricao}" prioridade="${titulo.prioridade}" projecto="${titulo.projecto_id}"
        data-bs-toggle="modal" data-bs-target="#modal-titulo-up">
            <i class="fa fa-arrows-rotate"></i>
        </a>
        <a href="#" class="btn btn-info text-white text-decoration-none mr-1" data-toggle="tooltip" data-placement="bottom" title="${titulo.prioridade}"
        onclick="ocultarTodosSubtitulos(${titulo.id})">
            <i class="fa fa-eye"></i>
        </a>
        <input class="form-control tit-conteudo w-75" value="${titulo.descricao}" id="input-tit-descricao-${titulo.id}" readonly/>
        <input class="form-control w-25" id="input-tit-prioridade-${titulo.id}" value="${titulo.prioridade}" readonly/>
    </div>`
        +formSubtitulo(titulo)+
   `<div class="ml-5" id="subtitulo-lista-${titulo.id}"> </div>
</div>`;

}
