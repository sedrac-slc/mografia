const projecto = $('#projecto');
projecto.ready(()=>{
    projecto.addClass('bg-primary text-white');
});

const den = $('.den');
const projectoUp = $('.projecto-up');

select = function(cls,obj){
    let child = $('select.'+cls).find('option');
    child.each(index => {
        if(child[index].value == obj.attr(cls)) child[index].selected = true;
    });
}

projectoUp.on('mouseover',function(){
    const obj = $(this);
    $('.id').val(obj.attr('value'));
    $('.nome').val(obj.attr('nome'));
    $('.data_inicio').val(obj.attr('data-inicio'));
    $('.data_fim').val(obj.attr('data-fim'));
    $('.descricao').val(obj.attr('pro-descricao'));
    $('.orcamento').val(obj.attr('orcamento'));
    select('acesso',obj);
    select('tipo',obj);
    select('tema',obj);
});

den.on('mouseover',function(){
    const obj = $(this);
    $('.id-den').val(obj.attr('pro-id'));
    $('.nome-den').val(obj.attr('nome'));
});
