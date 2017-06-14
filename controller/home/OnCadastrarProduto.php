<?php
session_start();
$_SESSION['idProduto'] = "";
header("location: ../../view/paginas/CadastroProduto.php?action=cadastrar");

