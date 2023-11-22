<?php
require_once './controller/itemController.php'; //pede informações da página de view que mostra os dados ao usuário 
require_once './database/conexao.php'; //inclui o arquivo para conexão ao banco 
require_once './repository/itemRepository.php';//inclui a lógica de repositótio de itens 

$conexao = new Conexao(); //instancia a classe de conexão 
$conn = $conexao->getConexao(); //obtém a conexão 

$itemRepository = new ItemRepository($conn);//instancia uma nova instância da classe ItemRepository, passando a conexão como argumento

$itemController = new ItemController($itemRepository);//cria uma nova instância da classe ItemController, passando o repositório de itens como argumento
$itemController->mostrarListagemProdutos();
?>