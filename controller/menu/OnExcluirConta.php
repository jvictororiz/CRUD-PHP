<?php
require '../../dao/UsuarioDAO.class.php';
require '../../dao/Conexao.class.php';
$usuarioDAO = new UsuarioDAO();
$usuarioDAO->delete($_GET['id']);
session_destroy();
header('Location: ../../view/paginas/index.php');
