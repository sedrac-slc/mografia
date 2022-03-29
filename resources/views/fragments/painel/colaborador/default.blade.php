<div class="m-2 p-2 m-auto w-75">
        <h5 class="text-center mt-4">
            <i class="fa-solid fa-users"></i>
            <span>Colaboradores</span>
        </h5>
        <div class="border rounded p-2 m-2">
            <p class="text-justify text-indent">
                Deves ativar, o processo de colaboração, para que tenhas as seguintes funcionalidades:
            </p>
            <hr/>
            <p class="ml-3 text-justify">
                <i class="fa-solid fa-check text-success"></i>
                <span class="ml-2">compartilhar os teus projectos, para que outras pessoas, colaboram de forma gratuita ou pago.</span>
            </p>
            <hr/>
            <p class="ml-3 text-justify">
                <i class="fa-solid fa-info text-warning"></i>
                <span class="ml-2">atenção que todos projectos, com colaboração, pode ser aterado ou modificado, pelo titulor e seus colaboradores.</span>
            </p>
            <p class="ml-3 text-justify">
                <i class="fa-solid fa-info text-warning"></i>
                <span class="ml-2">podes sempre, eliminar os teus colaboradores do seus projectos ou eles podem sair e eliminar, todos seus conteudos (pode ser pago ou não).</span>
            </p>
        </div>
        <a class="btn btn-primary text-center mt-2 ml-2" href="{{route('colaborador.insert',Auth::user()->id)}}">activar</a>
</div>
