const indece = $('#indece');

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

function ocultar_subt(id){
    let obj = $('#subtitulo-projecto-'+id);
    none(obj);
}
