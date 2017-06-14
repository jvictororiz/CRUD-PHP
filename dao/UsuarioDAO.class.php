<?php

class UsuarioDAO {

    private $conexao;

    public function __construct() {
        $this->conexao = new Conexao();
    }

    public function inserir($usuario) { 

        $sql = "INSERT INTO usuario (email, senha, nome, idade) VALUES ('" . $usuario->getEmail() . "' ,'" . md5($usuario->getSenha()) . "' , '" . $usuario->getNome() . "', '" . $usuario->getIdade() . "')";

        if (mysqli_query($this->conexao->getConection(), $sql)) {
            return true;
        } else {
            return false;
        }
    }

    public function update($usuario) {
        $sql = "UPDATE usuario set email ='" . $usuario->getEmail() . "',idade ='" . $usuario->getIdade() . "',nome ='" . $usuario->getNome() . "' where id = '" . $usuario->getId() . "' ;";
        if ($this->conexao->getConection()->query($sql)) {
            return true;
        } else {
            return false;
        }
    }

    public function delete($id) {
        $sql = "DELETE FROM  usuario where id ='" . $id . "' ;";
        if ($this->conexao->getConection()->query($sql)) {
            return true;
        } else {
            return false;
        }
    }

    public function select($email) {
        $usuario = new Usuario();        
        $sql = "SELECT * FROM  usuario where email ='" . $email . "' ;";
        $result = mysqli_query($this->conexao->getConection(), $sql);

        if ($result->num_rows > 0) {
            // output data of each row
            if ($row = $result->fetch_assoc()) {
                $usuario->setNome($row["nome"]);
                $usuario->setId($row["id"]);
                $usuario->setIdade($row["idade"]);
                $usuario->setSenha($row["senha"]);
                $usuario->setEmail($row["email"]);
                return $usuario;
            }
        } else {
            echo "Deu erro no select";
            return null;
        }
    }    

    public function validaLogin($login, $senha) {
        $sql = "SELECT * FROM usuario WHERE email = '" . $login . "'  and senha ='" . md5($senha) . "'";
        $execute = mysqli_query($this->conexao->getConection(), $sql);

        if (mysqli_num_rows($execute) > 0) {
            return true;
        } else {
            return false;
        }
    }

}

?>