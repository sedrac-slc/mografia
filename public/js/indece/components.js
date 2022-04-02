var contadorSubtitulo = 0;

function conteudoSub(titulo,subtitulo){
    return `<div class="mt-1 ml-2" id="subtitulo-${subtitulo.id}">
    <div class="d-flex">
        <a href="#" class="btn btn-danger text-white text-decoration-none mr-1" data-toggle="tooltip" data-placement="bottom" title="eliminar">
            <i class="fa fa-close"></i>
        </a>
        <a href="#" class="btn btn-warning text-white text-decoration-none mr-1" data-toggle="tooltip" data-placement="bottom" title="actualizar">
            <i class="fa fa-arrows-rotate"></i>
        </a>
        <a href="#" class="btn btn-info text-white text-decoration-none mr-1" data-toggle="tooltip" data-placement="bottom" title="${subtitulo.prioridade}">
            <i class="fa fa-eye"></i>
        </a>
        <input class="form-control sub-conteudo-${titulo}" value="${subtitulo.sub_descricao}" readonly/>
    </div>
</div>`;
}

function divSubtitulo(titulo){
    const painel = $('#subtitulo-lista-'+titulo);
    const params = {
        _token : $('#formulario-titulo > [name="_token"]').val(),
        id: contadorSubtitulo,
        titulo_id: titulo,
        sub_descricao: $('#subdescricao-'+titulo).val(),
        prioridade: $('#subprioridade-'+titulo).val()
    }
    var find = false;
    const subConteudo = $('.sub-conteudo-'+titulo);
    subConteudo.each(index=>{ if(subConteudo[index].value == params.sub_descricao) find = true; });
    if(!find){
        const url = $('#url-add-subtitulo').val();
        if(params.sub_descricao.length > 0){
            $.post(url, params, function(response){
                if(response != null){
                   painel.append(conteudoSub(titulo,response));
                  contadorSubtitulo++;
                }
            }).fail(function() {
                alert('não consegui');
            });
        }
    }else alert('subtitulo já existe ['+params.sub_descricao+'].');

}

function formSubtitulo(titulo){
    return `<section class="d-flex mt-1 d-none" id="subtitulo-projecto-${titulo.id}">
    <div class="mr-2 w-75">
        <div class="input-group">
            <span class="input-group-text" id="">subtitulo</span>
            <input class="form-control" type="text" name="descricao" id="subdescricao-${titulo.id}" autocomplete="none" required/>
        </div>
    </div>
    <div class="mr-2">
        <div class="input-group">
            <span class="input-group-text" id="">prioridade</span>
            <input class="form-control" type="number" name="prioridade" id="subprioridade-${titulo.id}" min="0" value="0" autocomplete="none" required/>
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
    return `<div class="mt-2">
    <div class="d-flex">
       <a class="btn btn-primary text-white text-decoration-none mr-1" id="subtitulo-open" data-toggle="tooltip" data-placement="bottom" title="subtitulo"
       onclick="ocultar_subt(${titulo.id})">
            <i class="fa fa-folder-tree"></i>
        </a>
        <a href="#" class="btn btn-danger text-white text-decoration-none mr-1" data-toggle="tooltip" data-placement="bottom" title="eliminar">
            <i class="fa fa-close"></i>
        </a>
        <a href="#" class="btn btn-warning text-white text-decoration-none mr-1" data-toggle="tooltip" data-placement="bottom" title="actualizar">
            <i class="fa fa-arrows-rotate"></i>
        </a>
        <a href="#" class="btn btn-info text-white text-decoration-none mr-1" data-toggle="tooltip" data-placement="bottom" title="${titulo.prioridade}">
            <i class="fa fa-eye"></i>
        </a>
        <input class="form-control tit-conteudo" value="${titulo.descricao}" readonly/>
    </div>`
        +formSubtitulo(titulo)+
   `<div class="ml-5" id="subtitulo-lista-${titulo.id}"> </div>
</div>`;
}
