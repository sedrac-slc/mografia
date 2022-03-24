const gerar = $('#gerar');
const provincia = $('#provincia_id');
const municipio = $('#municipio_id');

provincia.on('change',()=>{
  let template = '';
  let val = provincia.val();
  if(val > 0){
     $.get('/laravel/mografia/public/municipio/json/'+val,function(response){
         response.forEach(mun => {
            template += `<option value='${mun.id}'>${mun.descricao}</option>`;
        });
        municipio.html(template);
     });
  }else{municipio.html(template);}
});

function space(cap,variable){
    let array = variable.split(" ");
    if(array.length > 1){
        var str = cap ? capitalize(array[0]) : array[0].trim().toLowerCase();
         for(var i = 1; i < array.length; i++)
            str += capitalize(array[i].trim());
        return str;
    }
    return cap ? capitalize(variable)
               : variable.trim().toLowerCase();
}

function capitalize(variable){
    variable = variable.trim()
    let tam = variable.lenght;
    let first = variable.charAt(0).toUpperCase();
    let last = variable.substring(1,tam).toLowerCase();
    return first+last;
}

gerar.on('click',()=>{
    $('#name').val(space(false,$('#nome_completo').val())+"@mografia");
});
