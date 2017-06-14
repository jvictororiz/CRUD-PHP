<?php

class UsuarioController {

    public function __construct() {
        
    }

    public function saveUser($user) {
        require '../../dao/Conexao.class.php';
        require_once '../../dao/../model/Usuario.class.php';
        require_once '../../dao/../dao/UsuarioDAO.class.php';

        $usuarioDAO = new UsuarioDAO();
        $sucesso = $usuarioDAO->inserir($user);
        if ($sucesso == true) {
            return true;
        } else {
            return false;
        }
    }

    public function editUser($user) {
        $usuarioDAO = new UsuarioDAO();
        $sucesso = $usuarioDAO->update($user);
        if ($sucesso == true) {
            return true;
        } else {
            return false;
        }
    }

    static function validateUser($user, $repetirSenha) {
        //Validação de campos vazios
        if ((empty($user->getNome()))) {
            return "Campo 'Nome' não pode ficar vazio";
        } else if (($user->getEmail() == "")) {
            return "Campo 'E-mail' não pode ficar vazio";
        } else if ($user->getIdade() == 0) {
            return "Campo 'Idade' deve possuir um número maior do que 0";
        } else if ($user->getSenha() == "") {
            return "Campo 'Senha' não pode ficar vazio";
        } else if (!stripos($user->getEmail(), "@")) {
            return"E-mail inválido";
        } else if ($user->getSenha() != $repetirSenha) {
            return "As senhas não coincidem";
        } else {
            return "sucesso";
        }
    }

    static function validateUserEdicao($user) {
        //Validação de campos vazios
        if ((empty($user->getNome()))) {
            return "Campo 'Nome' não pode ficar vazio";
        } else if (($user->getEmail() == "")) {
            return "Campo 'E-mail' não pode ficar vazio";
        } else if ($user->getIdade() == 0) {
            return "Campo 'Idade' deve possuir um número maior do que 0";
        } else if (!stripos($user->getEmail(), "@")) {
            return"E-mail inválido";
        } else {
            return "sucesso";
        }
    }

}
?>

