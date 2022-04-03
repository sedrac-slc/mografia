const dataini = $('#data_inicio');
const datafim = $('#data_fim');
const dataerr = $('#data_err');

function caseOfData(){
    const ini = new Date(dataini.val());
    const fim = new Date(datafim.val());
    if(ini.getTime() <= fim.getTime()){
       dataerr.removeClass('d-block');
       dataerr.addClass('d-none');
    }else{
       dataerr.removeClass('d-none');
       dataerr.addClass('d-block');
    }
}

dataini.on('change',()=>{
    caseOfData();
});

datafim.on('change',()=>{
    caseOfData();
});
