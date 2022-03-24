<?php

namespace App\Components;

class ListTipoProjecto extends ListGeneral{

    function __construct($codigo,$descricao){
        parent::__construct($codigo,$descricao);
    }

    public static function all() : array{
        return [
            new ListTipoProjecto("MONOGRAFIA","Monográfia"),
            new ListTipoProjecto("REDACAO","Redação"),
            new ListTipoProjecto("ESCOLAR","Escolar"),
            new ListTipoProjecto("REVISTA","Reista")
        ];
    }

}
