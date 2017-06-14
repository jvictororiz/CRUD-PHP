<!DOCTYPE html>

<html>
    <head>
        <meta http-equiv="Content-type" content="text/html; charset=utf-8" />
        <?php
        require_once './cabecario.php';
        $meuCep = array();
        $meuCep['rua'] = "";
        $meuCep['bairro'] = "";
        $meuCep['cidade'] = "";
        $meuCep['estado'] = "";
        $meuCep['sucesso'] = 1;
        if ($_GET) {
            require_once '../../service/Cep.php';
            $cep = new Cep();
            $meuCep = $cep->serviceCep($_GET['cep']);
        }
        ?>
        <title>Home</title>
        <link href="../assets/css/bootstrap.min.css" rel="stylesheet">
    </head>
    <body>      
        <div class="container">
            <form class="navbar-form navbar-static-left" method="GET" action="PesquisaCep.php">
                <div class="form-control-static">
                    <input name="cep"type="text" class="form-control" placeholder="Digite seu CEP">
                </div>
                <button type="pesquisa" class="btn btn-default">Pesquisar</button>
            </form>
            <table class="table table-hover">
                <thead>
                    <tr>
                        <th width="30%">Logradouro/Nome</th>
                        <th >Bairro/Distrito</th>
                        <th>Cidade</th>
                        <th>Estado</th>
                    </tr>
                <td><?php
                if($meuCep['sucesso']){
                    if ($meuCep['rua']) {
                        echo $meuCep['rua'];
                    }
                    ?>
                </td>
                <td><?php
                    if ($meuCep['bairro'] != "") {
                        echo $meuCep['bairro'];
                    }
                    ?>
                </td>
                <td><?php
                    if ($meuCep['cidade'] != "") {
                        echo $meuCep['cidade'];
                    }
                    ?>
                </td>
                <td><?php
                    if ($meuCep['estado'] != "") {
                        echo $meuCep['estado'];
                    }
                }else{
                    require_once '../../utils/Message.php';
                    Message::error("Sem conexão com a internet");
                }
                    ?>
                </td>
                </thead>
            </table>
        </div>
    </body>
</html>
