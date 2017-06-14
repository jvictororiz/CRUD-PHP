<?php

class Produto {

    private $id;
    private $nome;
    private $qtd;
    private $tipo;
    private $usuario_id;
    private $valor;

    public function __construct() {
        
    }

    function getId() {
        return $this->id;
    }

    function getNome() {
        return $this->nome;
    }

    function getQtd() {
        return $this->qtd;
    }

    function getTipo() {
        return $this->tipo;
    }

    function getUsuario_id() {
        return $this->usuario_id;
    }

    function getValor() {
        return $this->valor;
    }

    function setId($id) {
        $this->id = $id;
    }

    function setNome($nome) {
        $this->nome = $nome;
    }

    function setQtd($qtd) {
        $this->qtd = $qtd;
    }

    function setTipo($tipo) {
        $this->tipo = $tipo;
    }

    function setUsuario_id($usuario_id) {
        $this->usuario_id = $usuario_id;
    }

    function setValor($valor) {
        $this->valor = $valor;
    }

}

?>