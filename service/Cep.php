<?php

class Cep {

    function serviceCep($cep) {
        if (!$sock = @fsockopen('cep.republicavirtual.com.br', 80, $num, $error, 5)){
                $dados['sucesso'] = 0;
        }else {
            $postCorreios = 'CEP=' . $cep . '&Metodo=listaLogradouro&TipoConsulta=cep';
            $reg = simplexml_load_file("http://cep.republicavirtual.com.br/web_cep.php?formato=xml&cep=" . $cep);
            $dados['sucesso'] = 1;
            $dados['rua'] = (string) $reg->tipo_logradouro . ' ' . $reg->logradouro;
            $dados['bairro'] = (string) $reg->bairro;
            $dados['cidade'] = (string) $reg->cidade;
            $dados['estado'] = (string) $reg->uf;
            $dados['cod'] = (string) $reg->resultado;

            return ($dados);
        }
    }

}
