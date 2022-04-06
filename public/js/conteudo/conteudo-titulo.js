var contador = 0;
const key = $("#text");

key.on("keyup", (event) => {
    if (event.keyCode == 13) {
        let tam = key.val().length - 1;
        let info = key.val().substring(0, tam);
        if (info.length > 0) {
            let page = $("#page");
            let accao = $("#accao");
            const parms = {
                nome: $("#nome").val(),
                descricao: $("#conteudo").val(),
                prioridade: $("#prioridade").val(),
            };
            let container = $("#container");
            if (page.hasClass("d-none")) {
                page.removeClass('d-none');
                if (!page.hasClass("bg-white rounded"))
                    page.addClass("bg-white rounded");
            }
            if (accao.val() == "add") {
                container.append(parg(contador, info));
                contador++;
            } else if (accao.val() == "upd") {
            } else {
            }
        }
        key.val("");
    }
});
