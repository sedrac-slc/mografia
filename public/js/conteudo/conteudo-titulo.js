var contador = 0;
const key = $('#text');

key.on('keyup',(event)=>{
   if(event.keyCode == 13){
        let tam = key.val().length - 1;
        let info = key.val().substring(0,tam);
        if(info.length > 0){
            console.log(contador);
            $("#container").append(parg(contador,info));
            contador++;
        }
        key.val("");
    }
});
