<?php

class ProdutoDAO {

    private $conexao;

    public function __construct() {
        $this->conexao = new Conexao();
    }

    public function inserir($produto) {
        $sql = "INSERT INTO produto (nome, qtd, tipo, valor, usuario_id) VALUES ('" . $produto->getNome() . "' ,'" . $produto->getQtd() . "' , '" . $produto->getTipo() . "', '" . $produto->getValor() . "', '" . $produto->getUsuario_id() . "');";
        if (mysqli_query($this->conexao->getConection(), $sql)) {
            return true;
        } else {
            return false;
        }
    }

    public function update($produto) {
        $sql = "UPDATE produto set nome ='" . $produto->getnome() . "' ,qtd ='" . $produto->getQtd() . "',tipo ='" . $produto->getTipo() . "',Valor ='" . $produto->getValor() . "' where idproduto = '" . $produto->getId() . "' ;";
        if ($this->conexao->getConection()->query($sql)) {
            return true;
        } else {
            return false;
        }
    }

    public function delete($idProduto) {
        $sql = "DELETE FROM  produto where idproduto ='" . $idProduto . "' ;";
        if ($this->conexao->getConection()->query($sql)) {
            return true;
        } else {
            return false;
        }
    }

    public function select($idProduto) {
        $produto = new Produto();

        $sql = "SELECT * FROM  produto where idproduto ='" . $idProduto . "';";
        $result = mysqli_query($this->conexao->getConection(), $sql);

        if ($result->num_rows > 0) {
            // output data of each row
            if ($row = $result->fetch_assoc()) {
                $produto->setId($row["idproduto"]);
                $produto->setNome($row["nome"]);
                $produto->setQtd($row["qtd"]);
                $produto->setTipo($row["tipo"]);
                $produto->setValor($row["valor"]);
                return $produto;
            }
        } else {
            echo "Deu erro no select";
            return null;
        }
    }



    public function selectProductsForUser($idUser) {
        $produtos = array();

        $sql = "SELECT * FROM  produto where usuario_id ='" . $idUser . "' ;";
        $result = mysqli_query($this->conexao->getConection(), $sql);
        if ($result->num_rows > 0) {
            for ($i = 0; $row = $result->fetch_assoc(); $i++) {
                $produto = new Produto();
                $produto->setId($row["idproduto"]);
                $produto->setNome($row["nome"]);
                $produto->setQtd($row["qtd"]);
                $produto->setTipo($row["tipo"]);
                $produto->setValor($row["valor"]);

                $produtos[$i] = $produto;
            }
            return $produtos;
        }
    }

}

?>