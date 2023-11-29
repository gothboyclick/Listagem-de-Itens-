<?php
require_once './model/item.php';//inclui o arquivo que contém a definição da classe item 
require_once './controller/itemControllerInterface.php';

class ItemRepository implements itemControllerInterface//define a classe ItemRepository 
{
    private $conexao;

    function __construct($conexao) //efetua a conexão com o banco de dados 
    {
        $this->conexao = $conexao;
    }

    public function getItens() //função que busca todos os tiens no banco de dados
    {
        // Query para buscar os itens no banco de dados
        $sql = "SELECT * FROM item";

        // Executa a query e armazena o resultado
        $resultado = mysqli_query($this->conexao, $sql);

        // Verifica se houve um erro na execução da query
        if ($resultado === false) {
            throw new Exception('Erro na consulta: ' . mysqli_error($this->conexao));
        }

        // Verifica se a query retornou algum resultado
        if (mysqli_num_rows($resultado) > 0) {
            // Armazena os resultados em um array associativo
            while ($row = mysqli_fetch_assoc($resultado)) {
                yield new Item(
                    $row['id'],
                    $row['nome'],
                    $row['descricao'],
                    $row['valor'],
                    $row['quant_estoque'],
                    $row['familia']
                );
            }
        } else {
            throw new Exception("Nenhum item encontrado");
        }
    }

    public function getItensPorNome($nome)//função para buscar item no banco de acordo com o que o usuário digitar 
    {
        // Query para buscar os itens no banco de dados
        $sql = "SELECT * FROM item WHERE nome LIKE ?";

        // Prepara a consulta SQL
        $stmt = mysqli_prepare($this->conexao, $sql);

        // Vincula o parâmetro à consulta
        $nome = '%' . $nome . '%';
        mysqli_stmt_bind_param($stmt, 's', $nome);

        // Executa a consulta e armazena o resultado
        mysqli_stmt_execute($stmt);
        $resultado = mysqli_stmt_get_result($stmt);

        // Verifica se houve um erro na execução da query
        if ($resultado === false) {
            throw new Exception('Erro na consulta: ' . mysqli_error($this->conexao));
        }

        // Verifica se a query retornou algum resultado
        if (mysqli_num_rows($resultado) > 0) {
            // Armazena os resultados em um array associativo
            while ($row = mysqli_fetch_assoc($resultado)) {
                yield new Item(
                    $row['id'],
                    $row['nome'],
                    $row['descricao'],
                    $row['valor'],
                    $row['quant_estoque'],
                    $row['familia']
                );
            }
        } else {
            throw new Exception("Nenhum item encontrado");
        }
    }
}
?>