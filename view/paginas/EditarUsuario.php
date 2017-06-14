<!DOCTYPE html>
<html lang="pt-br">
    <head>
        <link href="../assets/css/bootstrap.min.css" rel="stylesheet">
        <meta charset="UTF-8">
        <title>Editar</title>
        <link rel="stylesheet" href="../assets/css/estilo.css">

        <?php
        require_once '../../view/paginas/cabecario.php';
        $usuarioDAO = new UsuarioDAO();
        $usuario = $usuarioDAO->select($_SESSION['email']);
        ?>
    </head>
    <body>
        <div id="form-container">
            <div class="panel" id="form-box">

                <form action="EditarUsuario.php" method="post" id="form-cadastro">
                    <h1 class="text-center">Alterar perfil</h1>

                    <div class="form-group">
                        <label class="sr-only" for="nome">Nome</label>
                        <input type="text" name="nome" class="form-control" placeholder="Seu nome" value="<?php echo $usuario->getNome() ?>">
                    </div>

                    <div class="form-group">
                        <label class="sr-only" for="email">E-mail</label>
                        <input type="text" name="email" id="login" class="form-control" placeholder="Seu e-mail" value="<?php echo $usuario->getEmail() ?>">
                    </div>

                    <div class="form-group">
                        <label class="sr-only" for="idade">Idade</label>
                        <input type="number" name="idade" id="login" class="form-control" placeholder="Sua idade" value="<?php echo $usuario->getIdade() ?>">
                    </div>

                    <div class="form-group">
                        <input type="submit" value="Salvar Alterações" id="btn-submit" class="btn btn-primary form-control">
                    </div>

                    <?php
                    if ($_POST) {
                        require_once '../../utils/Message.php';
                        require_once '../../controller/cadastro/UsuarioController.php';
                        $usuario = new Usuario();
                        $usuarioController = new UsuarioController();

                        //Atribuindo valores dos campos a instancia de usuário
                        $usuario->setNome($_POST["nome"]);
                        $usuario->setEmail($_POST["email"]);
                        $usuario->setIdade($_POST["idade"]);
                        $usuario->setId($_SESSION['id']);

                        $retorno = $usuarioController->validateUserEdicao($usuario);
                        if ($retorno == "sucesso") {
                            if ($usuarioController->editUser($usuario)) {
                                session_start();
                                $_SESSION['email'] = $usuario->getEmail();
                                header("location: ../../view/paginas/Home.php?");
                            } else {
                                Message::error("Erro ao salvar usuário");
                            }
                        } else {
                            Message::error($retorno);
                        }
                    }
                    ?>
                </form>
            </div>
        </div>
    </body>
</html>
