<?php

class TableHome {

    private $idProduto;

    function getTabela($produtos, $textoPesquisa) {
        $produtosFiltrado = TableHome::getFiltro($produtos, $textoPesquisa);
        if ($produtosFiltrado > 0) {
            foreach ($produtosFiltrado as $produto) :
                echo "<td>";
                if ($produto != null) {
                    echo $produto->getId();
                }
                echo "</td>";
                echo "<td>";
                if ($produto != null) {
                    echo $produto->getNome();
                }
                echo"</td>";
                echo"<td>";
                if ($produto != null) {
                    echo $produto->getQtd();
                }
                echo"</td>";
                echo"<td>";
                if ($produto != null) {
                    echo $produto->getTipo();
                }
                echo"</td>";
                echo"<td>";
                if ($produto != null) {
                    echo 'R$   ' . $produto->getValor();
                    ;
                }
                echo'</td>
                <td class="actions text-right">
                
                        <a href="../../controller/home/OnEditarProduto.php?idProduto=' . $produto->getId() . '" class="btn btn-info btn-lg">
                        <span class="glyphicon glyphicon-pencil "></span> 
                        </a>
                        
                        <a href="../../controller/home/OnExcluirProduto.php?idProduto=' . $produto->getId() . '" class="btn btn-danger btn-lg">
                        <span class="glyphicon glyphicon-trash"></span> 
                        </a>                        
                    </p> 
                </td>
                </tr>

                <tr>';


            endforeach;
        } else {
            //Caso não tenha nenhum registro
            include_once '../../utils/Message.php';
            Message::error("Não foi encontrado nenhum produto");
        }
    }

    static function getFiltro($produtos, $pesquisa) {
        require_once '../../model/Produto.class.php';
        $produtosFiltro = array();
        $i = 0;
        //Caso pesquisa esteja vazio retorna logo o array todo
        if (empty($pesquisa)) {
            return $produtos;
        }
        foreach ($produtos as $produto) :
            //Pesquisa de forma case insensitive
            if (stripos($produto->getNome(), $pesquisa) !== false) {
                $produtosFiltro[$i] = $produto;
                $i++;
            }
        endforeach;

        require_once '../../utils/Message.php';
        if ($i > 0)
            Message::succes($i . " produtos encontrados !");
        else
            Message::alert($i . " produtos encontrados !");
        return $produtosFiltro;
    }

}
