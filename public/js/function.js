let act = $('.act');
const tema = $('.cls');
const descricao = $('.desc');

act.on('mouseover',function(){
    tema.val($(this).attr('value'));
    descricao.val($(this).attr('desc'));
});
