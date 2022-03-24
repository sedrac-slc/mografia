<?php

namespace App\Components\Html;

class ListPainel{
    private $codigo;
    private $descricao;

    function __construct($codigo,$descricao){
        $this->codigo = $codigo;
        $this->descricao = $descricao;
    }

    public function getCodigo(){
        return $this->codigo;
    }

    public static function fetchAll():array{
        return [
            new ListPainel("projecto","Projectos"),
            new ListPainel("temas","Temas"),
            new ListPainel("colaboradores","Colaboradores"),
            new ListPainel("pagamento","Pagamentos"),
            new ListPainel("informacoes","Informações"),
            new ListPainel("conta","Conta")
        ];
    }
}
