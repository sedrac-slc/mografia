const act = $('.act');
const prec = $('.prec');
const tema = $('.cls');
const descricao = $('.desc');

act.on('mouseover',function(){
    tema.val($(this).attr('value'));
    prec.val($(this).attr('prec'));
    descricao.val($(this).attr('desc'));
});
