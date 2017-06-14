<!DOCTYPE html>

<html>
    <head>
        <meta http-equiv="Content-type" content="text/html; charset=utf-8" />
        <?php
        require_once './cabecario.php';
        ?>
        <title>Home</title>
        <link href="../assets/css/bootstrap.min.css" rel="stylesheet">
    </head>
    <body>      
        <div class="container">
            <div class ="container">
                <form class="navbar-form navbar-static-left" method="GET" action="Home.php">
                    <div class="form-control-static">
                        <input name="pesquisa"type="text" class="form-control" placeholder="Ex: Mouse">
                        <button type="pesquisa" class="btn btn-default">Pesquisar</button>
                        <a target="_blank" href="../../controller/home/OnGerarPdf.php" class="btn btn-default">Gerar PDF</a>
                    </div>                    
                </form>

            </div>

        <table class="table table-hover">
            <thead>
                <tr>
                    <th>Id</th>
                    <th width="30%">NOME</th>
                    <th>QUANTIDADE</th>
                    <th>TIPO</th>
                    <th>VALOR</th>
                </tr>
            </thead>
            <tbody>
                <tr>
                    <?php
                    require_once '../../model/Produto.class.php';
                    require_once'../../controller/home/ProdutosController.php';
                    require_once '../../controller/home/TableHome.php';
                    $produtosController = new ProdutosController();
                    $pesquisa = new TableHome();
                    $produtos = $produtosController->getProductsForUser($_SESSION['email']);
                    $textoPesquisa = "";
                    //se o usuário pesquisar, recupera o texto digitado
                    if ($_GET) {
                        $textoPesquisa = $_GET['pesquisa'];
                    }
                    $pesquisa->getTabela($produtos, $textoPesquisa);
                    ?>
                </tr>
            </tbody>
        </table>
    </div>
</body>
</html>
