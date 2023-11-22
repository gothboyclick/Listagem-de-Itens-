<?php
require_once './database/conexao.php'; //inclui o arquivo para conexão ao banco 
require_once './controller/itemController.php';//iclui o arquivo que contém a lógica de contole de itens
require_once './repository/itemRepository.php';//inclui a lógica de repositótio de itens 

$conexao = new Conexao(); //instancia a classe de conexão 
$conn = $conexao->getConexao(); //obtém a conexão 

$itemRepository = new ItemRepository($conn);//instancia uma nova instância da classe ItemRepository, passando a conexão como argumento
$itemController = new ItemController($itemRepository);//cria uma nova instância da classe ItemController, passando o repositório de itens como argumento

$nome = isset($_POST['search']) ? $_POST['search'] : null;//verifica se a variável POST 'search' está definida, se estiver ele faz a pesquisa por nome, caso não ele apresenta todos os itens cadastrados

if ($nome !== null) { //se $nome não for null, chama a função getItensPorNome do controlador de itens. Se for null, chama a função getItens do controlador de itens
    $itens = $itemController->getItensPorNome($nome);
} else {
    $itens = $itemController->getItens();
}
?>

<html>

<head>
    <title>Lista de Dados</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/css/bootstrap.min.css"
        integrity="sha384-Zenh87qX5JnK2Jl0vWa8Ck2rdkQ2Bzep5IDxbcnCeuOxjzrPF/et3URy9Bv1WTRi" crossorigin="anonymous">
    <style>
        h1 {
            text-align: center;
        }
    </style>
</head>

<body>
    <nav class="navbar navbar-dark bg-dark">
        <div class="container-fluid">
            <a class="navbar-brand" href="#">Controle de Estoque</a>
        </div>
    </nav><br>
    <h1>Lista de Dados</h1><br>
    <div class="container">
        <form method="post">
            <label for="search">Pesquisar por nome:</label>
            <input type="text" name="search" id="search">
            <input type="submit" value="Pesquisar">
        </form>

        <table class="table table-striped table-bordered table-condensed table-hover">
            <tr>
                <th>Id</th>
                <th>Nome</th>
                <th>Descrição</th>
                <th>Valor Médio</th>
                <th>Estoque Atual</th>
                <th>Família</th>
            </tr>

            <?php foreach ($itens as $item): ?>
                <tr>
                    <td>
                        <?php echo ($item->id); ?>
                    </td>
                    <td>
                        <?php echo ($item->nome); ?>
                    </td>
                    <td>
                        <?php echo ($item->descricao); ?>
                    </td>
                    <td>
                        <?php echo ($item->valor); ?>
                    </td>
                    <td>
                        <?php echo ($item->quant_estoque); ?>
                    </td>
                    <td>
                        <?php echo ($item->familia); ?>
                    </td>
                </tr>
            <?php endforeach; ?>

        </table>
</body>

</html>