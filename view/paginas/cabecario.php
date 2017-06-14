<?php
session_start();
if (!(isset($_SESSION['email']))) {
    header("Location: index.php");
    exit();
} else {
    //código para exibir nome do usuário
    require_once '../../dao/Conexao.class.php';
    require_once '../../dao/UsuarioDAO.class.php';
    require_once '../../model/Usuario.class.php';
    $usuarioDAO = new UsuarioDAO();
    $usuario = $usuarioDAO->select($_SESSION['email']);
}
?>
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>

<nav class="navbar navbar-inverse">
    <div class="container-fluid">
        <div class="navbar-header">
            <a class="navbar-brand" href="#">Sistema</a>
        </div>        
        <ul class="nav navbar-nav">
            <li class="active"><a href="../paginas/Home.php">Home</a></li>
            <li class="active"><a href="../../controller/home/OnCadastrarProduto.php">Inserir produto</a></li>
            <li class="active"><a href="PesquisaCep.php">Consultar CEP</a></li>
        </ul>
        <ul class="nav navbar-nav navbar-right">
            <li class="active"> <a class="dropdown-toggle" data-toggle="dropdown" href="#"><?php echo strtoupper($usuario->getNome()) ?><span class="caret"></span></a>
                <ul class="dropdown-menu">
                    <li><a href="../paginas/EditarUsuario.php"><span class="glyphicon glyphicon-user"></span> Alterar Perfil</a></li>
                    <li><a href="../../controller/menu/OnExcluirConta.php?id=<?php echo $usuario->getId() ?>"><span class="glyphicon glyphicon-trash"></span> Deletar Conta</a></li>
                    <li><a href="../../controller/menu/OnSair.php"><span class="glyphicon glyphicon-log-in"></span> Sair</a></li>
                </ul>
            </li>            
        </ul>

    </div>
</nav>
