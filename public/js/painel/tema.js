const tema = $('#tema');
tema.ready(()=>{
    tema.addClass('bg-primary text-white');
});

const temasUp = $('.tema-act');
temasUp.on('mouseover',function(){
  let actual = $(this);
  $('.tema_id').val(actual.attr('value'));
  $('.descricao').val(actual.attr('descricao'));
});

