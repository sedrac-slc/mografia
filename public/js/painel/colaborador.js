const colaborador = $('#colaborador');
colaborador.ready(()=>{
    colaborador.addClass('bg-primary text-white');
});

const den = $('.den');
den.on('mouseover',function(){
    let act = $(this);
    $('.id').val(act.attr('value'));
    $('.projecto_id').val(act.attr('projecto'));
    $('.colaborador_id').val(act.attr('colaborador'));
});
