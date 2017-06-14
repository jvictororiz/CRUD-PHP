<?php

require_once '../../controller/home/ProdutosController.php';
require_once '../../model/Usuario.class.php';
require_once '../../dao/UsuarioDAO.class.php';
require_once '../../dao/Conexao.class.php';
require_once '../../model/Produto.class.php';
require_once '../../view/assets/dompdf/dompdf_config.inc.php';
require_once '../home/TablePDF.php';
session_start();
$id = $_SESSION['email'];
$produtoController = new ProdutosController();
$produtos = $produtoController->getProductsForUser($id);
$gerarLinhas = new TablePDF();
$restante = $gerarLinhas->getTabela($produtos);
$total = $gerarLinhas->getTotal();
$html = '<html>
<head>
<link href="../assets/css/bootstrap.min.css" rel="stylesheet">
<meta http-equiv="Content-type" content="text/html; charset=utf-8" />


</head>
<body>

<h2>____________RELATÓRIO____________</h2>
<p>Relatório dos produtos adquiridos:</p>

<table class="table table-hover">
            <thead>
                <tr>
                    <th>Id</th>
                    <th width="30%">NOME</th>
                    <th>QUANTIDADE</th>
                    <th>TIPO</th>
                    <th>VALOR</th>
                    <th>TOTAL</th>
                </tr>
            </thead>
            <tbody>
                <tr>
                  ' . $restante . '
                </tr>
            </tbody>
        </table>
        </br>
        <p>Valor final dos produtos: R$ '.$total.'</p>
</div>

</body>
</html>

        ';
$arquivo = "meuArquivo.pdf";
$domPedf = new DOMPDF();
$domPedf->load_html($html);
$domPedf->render();
$domPedf->stream("Relatório.pdf");
?>

