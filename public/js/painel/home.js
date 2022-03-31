const home = $('#home');
home.ready(()=>{
    home.addClass('bg-primary text-white');
});

const items = $('#group-desc .list-group-item');

items.on('mouseover',function(event){
    items.removeClass('active');
    items.children("div").removeClass('text-white');
    let actual = $(this);
    actual.addClass('active');
});
