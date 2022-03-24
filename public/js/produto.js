const act = $('.act');
const den = $('.den');

act.on('mouseover',function(){
    const obj = $(this);
    $('.id').val(obj.attr('pro-id'));
    $('.nome').val(obj.attr('nome'));
    $('.data_inicio').val(obj.attr('data-inicio'));
    $('.data_fim').val(obj.attr('data-fim'));
    $('.descricao').val(obj.attr('pro-desc'));
});

den.on('mouseover',function(){
    const obj = $(this);
    $('.id-den').val(obj.attr('pro-id'));
    $('.nome-den').val(obj.attr('nome'));
});


