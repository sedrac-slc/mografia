var contador = 0;
const key = $("#text");
const page = $("#page");
const container = $("#container");

function eliminar(id){
    var url = $('#url-delete').val().replace('parm',id);
    $.get(url,(response)=>{
        if(response.delete){
            const painel = $('#parg-conteudo-'+id);
            painel.remove();
        }
    });
}

function actualizar(id){
   const pargAct = $('#parg-act-'+id);
   $('#id').val(id);
   $('#accao').val('upd');
   $('#nome').val(pargAct.attr('nome'));
   $('#text').val(pargAct.attr('descricao'));
   $('#prioridade').val(pargAct.attr('prioridade'));
   $('#conteudo_id').val(pargAct.attr('conteudo-tipo'));
}

function openPage(page){
    if (page.hasClass("d-none")) {
        page.removeClass('d-none');
        if (!page.hasClass("bg-white rounded"))
            page.addClass("bg-white rounded");
    }
}

function reboot(){
    const url = $('#url-show').val();
    $.get(url,(response)=>{
        if(response.length > 0){
             openPage(page);
             response.forEach(conteudo => {
                 container.append(parg(conteudo));
             });
        }
    });
}

page.ready(()=>{
    reboot();
});

function addSum(prioridade){
    var num = parseInt(prioridade) + 1;
    $("#nome").attr("value","parag-"+num);
    $("#prioridade").attr("min",num);
    $("#prioridade").val(num);
}

function  crud(va,parms){
    var url;
    let container = $("#container");
    switch(va){
        case "add":
            url = $('#url-add').val();
            $.post(url,parms,function(response){
                container.append(parg(response));
                addSum(response.prioridade);
            });
        break;
        case "upd":
            url = $('#url-upd').val().replace('parm', $("#id").val() );
            $.post(url,parms,function(response){
                if(!response.update){
                    $('#accao').val('add');
                    container.html('');
                    reboot();
                }
            });
        break;
    }
}

key.on("keyup", (event) => {
    if (event.keyCode == 13) {
        let tam = key.val().length - 1;
        let descricao = key.val().substring(0, tam);
        if (descricao.length > 0) {
            let accao = $("#accao").val();
            let tipo = $('#tipo').val();
            openPage(page);
            if(tipo == "titulo"){
                let parms = {
                    _token: $('[name="_token"]').val(),
                    nome: $("#nome").val(),
                    titulo_id: $('#chave').val(),
                    conteudo_tipo_id: $("#conteudo_id").val(),
                    descricao: descricao,
                    prioridade: $("#prioridade").val(),
                };
                crud(accao,parms);
            }else if(tipo == "subtitulo"){
                let parms = {
                    _token: $('[name="_token"]').val(),
                    nome: $("#nome").val(),
                    subtitulo_id: $('#chave').val(),
                    conteudo_tipo_id: $("#conteudo_id").val(),
                    descricao: descricao,
                    prioridade: $("#prioridade").val(),
                };
                crud(accao,parms);
            }


        }
        key.val("");
    }
});

$('#parg-controls').on('click',()=>{
    const parg = $('#controls');
    if(parg.hasClass('d-none')) parg.removeClass('d-none');
    else parg.addClass('d-none');
});

$('#parg-accao').on('click',()=>{
    const parg = $('.parg-control');
    if(parg.hasClass('d-none')) parg.removeClass('d-none');
    else parg.addClass('d-none');
});

$('#parg-uni').on('click',()=>{
    const parg = $('.uni');
    if(parg.hasClass('d-none')) parg.removeClass('d-none');
    else parg.addClass('d-none');
});
