<?php

namespace App\Components;

class ListGeneral{
    protected $codigo;
    protected $descricao;

    function __construct($codigo,$descricao){
        $this->codigo = $codigo;
        $this->descricao = $descricao;
    }

    public function getCodigo(){
        return $this->codigo;
    }

    public function getDescricao(){
        return $this->descricao;
    }

    public function setCodigo($codigo){
        $this->codigo = $codigo;
    }

    public function setDescricao($descricao){
        $this->descricao = $descricao;
    }

}
