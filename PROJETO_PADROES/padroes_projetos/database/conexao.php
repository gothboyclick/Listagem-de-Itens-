<?php
class Conexao //define a classe conexão 
{
    private $servidor = "localhost"; //variáveis que aramzenam dados para conexão ao banco
    private $usuario = "root";
    private $senha = "";
    private $dbname = "estoque";
    private $conn;

    public function getConexao() //função púbica que inicializa a variável conn como nula
    {
        $this->conn = null;

        try { //tenta estabelecer a conexão ao banco 
            $this->conn = new mysqli($this->servidor, $this->usuario, $this->senha, $this->dbname); //cria uma nova conexão mysqli com os detalhes do servidor, usuário, senha e nome do banco de dados
        } catch (mysqli_sql_exception $exception) {
            echo "Erro na conexão: " . $exception->getMessage();//se houver um erro na conexão é exibido na tela 
        }

        return $this->conn; //retorna as informações a conexão 
    }
}
?>