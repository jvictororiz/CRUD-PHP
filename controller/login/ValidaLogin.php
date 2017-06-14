<?php

require_once '../../dao/UsuarioDAO.class.php';
require_once '../../dao/Conexao.class.php';
require_once '../../model/Usuario.class.php';


$login = $_POST['inp_email'];
$senha = $_POST['inp_senha'];


$usuarioDAO = new UsuarioDAO();
$usuario = new Usuario();

$resultado = $usuarioDAO->validaLogin($login, $senha);

if ($resultado) {
    session_start();
    $_SESSION['email'] = $login;
    header("location: ../../view/paginas/Home.php?");
} else {
    header("location: ../../view/paginas/index.php?erro=senha");
}
?>
