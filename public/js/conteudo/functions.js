
function eliminar(id){
    const url = $('#url-delete').val().replace('param',id);
    $.get(url,(response)=>{
        if(response.delete){
            const painel = $('#parg-conteudo-'+id);
            painel.remove();
        }
    });
}
