<?php

class Conexao {
    
    private $usuario = "root";
    private $senha = "";
    private $host = "localhost";
    private $banco = "projeto_php";
    private $con;
    private $caminho;

    public function __construct() {
        $this->con = mysqli_connect($this->caminho, $this->usuario, $this->senha) or die("Conexão com o banco de dados falhou" . mysqli_errno($con));
        mysqli_select_db($this->con, $this->banco) or die("Conexão com o banco falhou " . mysqli_error($this->con));
    }

    public function getConection() {
        return $this->con;
    }

}

?>