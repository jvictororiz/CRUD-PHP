<?php

class ProdutosController {

    public function __construct() {
        
    }

    public function getProductsForUser($email) {
        require_once '../../dao/ProdutoDAO.class.php';

        $usuario = new Usuario();
        $usuarioDAO = new UsuarioDAO();
        $produtoDAO = new ProdutoDAO();
        $usuario = $usuarioDAO->select($email); //Selecionando o usuário logado através do email para buscar o id
        $produtos = $produtoDAO->selectProductsForUser($usuario->getId()); //selecionando os produtos do usuário já que agora temos o id
        $_SESSION['id'] = $usuario->getId();

        return $produtos;
    }
    
    public function getProduct($id) {
        require_once  '../../model/Usuario.class.php';
        require_once '../../dao/UsuarioDAO.class.php';
        require_once '../../dao/ProdutoDAO.class.php';
        require_once '../../dao/Conexao.class.php';

        $produtoDAO = new ProdutoDAO();
        
        $produto = $produtoDAO->select($id); //selecionando os produtos do usuário já que agora temos o id
        return $produto;
    }

    
    public function saveProduct($produto) {
        require_once '../../dao/Conexao.class.php';
        require_once '../../dao/ProdutoDAO.class.php';
        $protutoDAO = new ProdutoDAO();
        $sucesso = $protutoDAO->inserir($produto);
        return $sucesso;
    }

    public function editProduct($produto) {
        $protutoDAO = new ProdutoDAO();
        $sucesso = $protutoDAO->update($produto);
        return $sucesso;
    }
    
        public function deleteProduct($id) {
        require_once '../../dao/Conexao.class.php';
        require_once '../../dao/ProdutoDAO.class.php';
        $protutoDAO = new ProdutoDAO();
        $sucesso = $protutoDAO->delete($id);
        return $sucesso;
    }


}
?>

