const conta = $('#conta');
conta.ready(()=>{
    conta.addClass('bg-primary text-white');
});

const provincia = $('#provincia_id');
const municipio = $('#municipio_id');

function municipios(value){
    let template = '';
    if(value > 0){
        $.get('/laravel/mografia/public/municipio/json/'+value,function(response){
            response.forEach(mun => {
               template += `<option value='${mun.id}'>${mun.mun_descricao}</option>`;
           });
           municipio.html(template);
        });
     }else{municipio.html(template);}
}

provincia.on('change',()=>{
    municipios(provincia.val());
});

provincia.ready(()=>{
    municipios(provincia.val());
});
