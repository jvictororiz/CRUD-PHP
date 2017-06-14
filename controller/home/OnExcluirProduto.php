<?php
$id = $_GET['idProduto'];
require_once '../../controller/home/ProdutosController.php';
echo 'entrou';
$produtoController = new ProdutosController();
$sucesso = $produtoController->deleteProduct($id);
if($sucesso) {
    header("location: ../../view/paginas/Home.php?");
}else{
    echo 'erro';
}


