<!DOCTYPE html>
<html lang="pt-br">
    <head>
        <link href="../assets/css/bootstrap.min.css" rel="stylesheet">
        <meta charset="UTF-8">
        <title>Cadastro</title>
        <link rel="stylesheet" href="../assets/css/estilo.css">

    </head>
    <body>
        <div id="form-container">
            <div class="panel" id="form-box">

                <form action="CadastroUsuario.php" method="post" id="form-cadastro">
                    <h1 class="text-center">Cadastre-se</h1>

                    <div class="form-group">
                        <label class="sr-only" for="nome">Nome</label>
                        <input type="text" name="nome" class="form-control" placeholder="Seu nome" value="">
                    </div>

                    <div class="form-group">
                        <label class="sr-only" for="email">E-mail</label>
                        <input type="text" name="email" id="login" class="form-control" placeholder="Seu e-mail" value="">
                    </div>

                    <div class="form-group">
                        <label class="sr-only" for="idade">Idade</label>
                        <input type="number" name="idade" id="login" class="form-control" placeholder="Sua idade" value="">
                    </div>

                    <div class="form-group">
                        <label class="sr-only" for="senha">Senha</label>
                        <input type="password" name="senha" id="senha" class="form-control" placeholder="Digite sua senha" value="">
                    </div>

                    <div class="form-group">
                        <label class="sr-only" for="senha">Confirme a senha</label>
                        <input type="password" name="repetirSenha" class="form-control" placeholder="Confirme sua senha">
                    </div>

                    <div class="form-group">
                        <input type="submit" value="Cadastrar" id="btn-submit" class="btn btn-primary form-control">
                    </div>

                    <?php
                    if ($_POST) {
                        require_once '../../controller/cadastro/UsuarioController.php';
                        require_once '../../model/Usuario.class.php';
                        require_once '../../utils/Message.php';
                        $usuario = new Usuario();
                        $usuarioController = new UsuarioController();

                        //Atribuindo valores dos campos a instancia de usuário
                        $usuario->setNome($_POST["nome"]);
                        $usuario->setEmail($_POST["email"]);
                        $usuario->setIdade($_POST["idade"]);
                        $usuario->setSenha($_POST["senha"]);

                        $retorno = $usuarioController->validateUser($usuario, $_POST['repetirSenha']);
                        if ($retorno == "sucesso") {
                            if($usuarioController->saveUser($usuario)){
                            session_start();
                            $_SESSION['email'] = $usuario->getEmail();
                            header("location: ../../view/paginas/Home.php?");
                            //Message::succes($usuarioController->saveUser($usuario));
                            }else{
                                Message::error("Erro ao salvar usuário");
                            }
                        } else {
                            Message::error($retorno);
                        }
                    }
                    ?>

                    <div class="form-group">
                        Já é registrado? <a href="index.php?">Efetue login</a>.
                    </div>
                </form>
            </div>
        </div>
    </body>
</html>
