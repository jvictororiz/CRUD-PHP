<?php
session_start();
$id = $_GET['idProduto'];
$_SESSION['idProduto'] = $id;
header("location: ../../view/paginas/CadastroProduto.php?action=editar");

