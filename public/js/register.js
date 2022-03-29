const gerar = $('#gerar');

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
