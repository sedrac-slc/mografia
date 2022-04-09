const indece = $('#indece');

function maxPri(url){
    var num = 0;
    $.get(url,function(response){
        num = parseInt(response.max);
        const prip = $('#tit-prioridade');
        prip.attr('min',num+1);
        prip.val(num+1);
    });
    return  num;
}

function maxPrioridade(id,tipo){
    return maxPri($("#url-max-"+tipo).val().replace('parm',id));
}


function tituloPrip(va){
    maxPrioridade(va,'titulo');
}



indece.ready(()=>{
    indece.addClass('bg-primary text-white');
});

const tituloOpen = $('#titulo-open');
const tituloProjecto = $('#titulo-projecto');

tituloOpen.on('click',function(){
    if(tituloProjecto.hasClass("d-none")) tituloProjecto.removeClass('d-none');
    else tituloProjecto.addClass('d-none');
});

var contadorTitulo = 0;
const btnTitulo = $('#btn-titulo');
const tituloLista = $('#titulo-lista');

btnTitulo.on('click',function(event){
    var find = false;
    const titConteudo = $('.tit-conteudo');
    titConteudo.each(index=>{ if(titConteudo[index].value == $('#tit-descricao').val()) find = true; });
    if(!find){
        const url = $('#url-add-titulo').val();
        const params = {
            _token : $('#formulario-titulo > [name="_token"]').val(),
            id: contadorTitulo,
            projecto_id: $('#projecto-id').val(),
            descricao: $('#tit-descricao').val(),
            prioridade: $('#tit-prioridade').val()
        }

        if(params.descricao.length > 0){
             $.post(url, params, function(response){
                if(response != null){
                    tituloLista.append(divTitulo(response));
                    contadorTitulo++;
                    tituloPrip(searchProjecto.val());
                }
            }).fail(function() {

            });
        }else alert('titulo esta vazio.');

    }
    else alert('titulo já existe ['+$('#tit-descricao').val()+'].');

});


function none(cls){
    if(cls.hasClass("d-none")) cls.removeClass('d-none');
    else cls.addClass('d-none');
}

function ocultarSubtitulo(id){
    let obj = $('#subtitulo-projecto-'+id);
    none(obj);
}

function ocultarTodosSubtitulos(id){
    const lista = $('.subtitulo-div-'+id);
    lista.each(index=>{
        none($('#'+lista[index].id));
    });
}

const btnDel = $('#btn-del');

function eliminarTitulo(id){
   const btn = $('#btn-tit-del-'+id);
   btnDel.val('titulo');
    $('#titulo-acao').html("Titulo");
    $('#del-id').val(id);
    $('#del-descricao').val(btn.attr('descricao'));
    $('#del-prioridade').val(btn.attr('prioridade'));
}

function eliminarSubTitulo(id){
    const btn = $('#btn-sub-del-'+id);
    btnDel.val('subtitulo');
    $('#titulo-acao').html("Subtitulo");
    $('#del-id').val(id);
    $('#del-descricao').val(btn.attr('descricao'));
    $('#del-prioridade').val(btn.attr('prioridade'));
}

btnDel.on('click',function(){
    var  url, painel;
    const id = $('#del-id').val();
    const situacao = btnDel.val();

    if(situacao == "titulo"){ painel = $('#titulo-'+id);
        url = $('#url-del-titulo').val().replace('param',id);
    }else if(situacao == "subtitulo"){ painel = $('#subtitulo-'+id);
        url = $('#url-del-subtitulo').val().replace('param',id);
    }

    $.get(url,function(response){
       if(response.delete){
           painel.remove();
           $('#modal-delete-titulo').modal('hide');
       }
    });

});

const btnUp = $('#btn-up');

function actualizarTitulo(id){
    const btn = $('#btn-tit-up-'+id);
    btnUp.val('titulo');
    $('#up-id').val(id);
    $('#up-chave').val(btn.attr('projecto'));
    $('#up-descricao').val(btn.attr('descricao'));
    $('#up-prioridade').val(btn.attr('prioridade'));
}

function actualizarSubtitulo(id){
    const btn = $('#btn-sub-up-'+id);
    btnUp.val('subtitulo');
    $('#up-id').val(id);
    $('#up-chave').val(btn.attr('titulo_id'));
    $('#up-descricao').val(btn.attr('descricao'));
    $('#up-prioridade').val(btn.attr('prioridade'));
}

function update(ch,idbtn,delbtn, response){
    const btn = $(idbtn+response.id);
    $('#input-'+ch+'-descricao-'+response.id).val(response.descricao);
    $('#input-'+ch+'-prioridade-'+response.id).val(response.prioridade);
    btn.attr('descricao',response.descricao);
    btn.attr('prioridade',response.prioridade);
    $(delbtn+response.id).attr('descricao',response.descricao)
    $(delbtn+response.id).attr('prioridade',response.prioridade);
    $('#tit-descricao').val("");
    $('#tit-prioridade').val(0);
    $('#modal-titulo-up').modal('hide');
}

btnUp.on('click',function(){
    const situacao = btnUp.val();
    var btn;
    if(situacao == "titulo"){
     const url = $('#url-upd-titulo').val();
     const params = {
        _token : $('#formulario-titulo > [name="_token"]').val(),
        id: $('#up-id').val(),
        projecto_id: $('#up-chave').val(),
        descricao: $('#up-descricao').val(),
        prioridade: $('#up-prioridade').val()
     }
     if(params.descricao.length > 0){
        $.post(url,params,function(response){
            if(!response.update)
                update("tit","#btn-tit-up-","#btn-tit-del-",response);
        });
      }
    }else if(situacao == "subtitulo"){
        const url = $('#url-upd-subtitulo').val();
        const params = {
            _token : $('#formulario-titulo > [name="_token"]').val(),
            id: $('#up-id').val(),
            titulo_id: $('#up-chave').val(),
            descricao: $('#up-descricao').val(),
            prioridade: $('#up-prioridade').val()
         }
        if(params.descricao.length > 0){
           $.post(url,params,function(response){
              if(!response.update)
                   update("sub","#btn-sub-up-","#btn-sub-del-",response);
           });
         }
    }

});

