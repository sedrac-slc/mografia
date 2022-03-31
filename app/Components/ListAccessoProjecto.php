<?php

namespace App\Components;

class ListAccessoProjecto extends ListGeneral{

    function __construct($codigo,$descricao){
        parent::__construct($codigo,$descricao);
    }

    public static function all() : array{
        return [
            new ListAccessoProjecto("MONOGRAFIA","Monográfia"),
            new ListAccessoProjecto("REDACAO","Redação"),
            new ListAccessoProjecto("ESCOLAR","Escolar"),
            new ListAccessoProjecto("REVISTA","Reista")
        ];
    }

}
