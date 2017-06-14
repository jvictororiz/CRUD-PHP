<!DOCTYPE html>
<html lang="pt-br">
    <head>
        <?php
        require_once '../paginas/cabecario.php';
        require_once '../../utils/Message.php';
        require_once '../../controller/home/ProdutosController.php';
        require_once '../../model/Produto.class.php';

        $action = $_GET['action'];
        $produtoEdicao = null;
        if ($action == "editar") {
            $produtoController = new ProdutosController();
            $produtoEdicao = $produtoController->getProduct($_SESSION['idProduto']);
            ;
        }
        ?>
        <link href="../assets/css/bootstrap.min.css" rel="stylesheet">
        <link rel="stylesheet" href="../assets/css/estilo.css">

        <meta charset="UTF-8">
        <title>Cadastro</title>


    </head>
    <body>
        <div id="form-container">
            <div class="panel" id="form-box">

                <form  action ="CadastroProduto.php?<?php echo "action=" . $action ?>"  method="post" id="form-cadastro">
                    <h1 class="text-center"><?php echo $action . " " ?> produto</h1>

                    <div class="form-group">
                        <label class="sr-only" for="nome">Nome</label>
                        <input type="text" name="nome" class="form-control" placeholder="Nome" value="<?php if ($produtoEdicao != null) echo $produtoEdicao->getNome() ?>">
                    </div>

                    <div class="form-group">
                        <label class="sr-only" for="login">Quantidade</label>
                        <input type="number" name="quantidade" id="login" class="form-control" placeholder="Quantidade" value="<?php if ($produtoEdicao != null) echo $produtoEdicao->getQtd() ?>">
                    </div>

                    <div class="form-group">
                        <label class="sr-only" for="senha">Tipo</label>
                        <input type="text" name="tipo" id="senha" class="form-control" placeholder="Tipo" value="<?php if ($produtoEdicao != null) echo $produtoEdicao->getTipo() ?>">
                    </div>

                    <div class="form-group">
                        <label class="sr-only" for="senha">Valor</label>
                        <input type="number" name="valor" class="form-control" placeholder="Valor" value = "<?php if ($produtoEdicao != null) echo $produtoEdicao->getValor() ?>">
                    </div>

                    <div class="form-group">
                        <input type="submit" value="Salvar" id="btn-submit" class="btn btn-primary form-control">
                    </div>

                    <?php
                    //Após o clique de salvar
                    if ($_POST) {
                        $produto = new Produto();
                        $produtosController = new ProdutosController();
                        
                        //Atribuindo valores dos campos a instancia de produto
                        $produto->setNome($_POST["nome"]);
                        $produto->setQtd($_POST["quantidade"]);
                        $produto->setTipo($_POST["tipo"]);
                        $produto->setValor($_POST["valor"]);
                        $produto->setUsuario_id(($_SESSION['id']));
                        
                        //Validação de campos vazios
                        if (($produto->getNome() == "")) {
                            Message::alert("Campo 'Nome' não pode ficar vazio");
                        } else if (($produto->getTipo() == "")) {
                            Message::alert("Campo 'Tipo' não pode ficar vazio");
                        } else if ($produto->getQtd() == 0) {
                            Message::alert("Campo 'Quantidade' deve possuir um número maior do que 0");
                        } else if ($produto->getValor() == 0) {
                            Message::alert("Campo 'Valor' deve possuir um número maior do que 0");
                        } else {
                            //Caso esteja cadastrando um novo produto
                            if ($action == "cadastrar") {
                                $sucesso = $produtosController->saveProduct($produto);
                                if ($sucesso) {
                                    Message::succes("Produto cadastrado com sucesso");
                                } else {
                                    Message::error("Erro ao cadastrar produto !");
                                }
                            } else if ($action == "editar") {
                                //Caso esteja editando um produto já existente
                                $produto->setId($_SESSION['idProduto']); //Atribuição do id do produto, já que el já existe
                                $sucesso = $produtosController->editProduct($produto);
                                if ($sucesso) {
                                    header("location: ../../view/paginas/Home.php?");
                                } else {
                                    Message::error("Erro ao editar produto !");
                                }
                            }
                        }
                    }
                    ?>
                </form>
            </div>
        </div>
    </body>
</html>
