
const searchProjecto = $('#projecto-id');

function treeTitulo(titulo){
    tituloLista.append(divTitulo(titulo));
    const url = $('#url-lis-subtitulo').val().replace('parm',titulo.id);
    const subtituloLista = $('#subtitulo-lista-'+titulo.id);
    $.get(url,function(response){
        if(response.length > 0)
            response.forEach(subtitulo => {
                subtituloLista.append(buildDivSubtitulo(titulo.id,subtitulo));
            });
    });
}

function buildTree(id){
    const url = $('#url-lis-titulo').val().replace('parm',id);
    $.get(url,function(response){
        if(response.length > 0)
            response.forEach(titulo => {
                treeTitulo(titulo);
            });
    });
}

searchProjecto.ready(function(){
    buildTree(searchProjecto.val());
});

searchProjecto.on('change',function(){
    tituloLista.html("");
    buildTree(searchProjecto.val());
});
