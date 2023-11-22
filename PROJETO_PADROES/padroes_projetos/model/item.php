<?php
class Item //define uma classe chamada 'Item'
{
    //declara variáveis públicas que serão usadas para armazenar informações sobre um item
    public $id;
    public $nome;
    public $descricao;
    public $valor;
    public $quant_estoque;
    public $familia;

    //define o construtor da classe, que é uma função especial que é chamada automaticamente quando um objeto desta classe é criado
    function __construct($id, $nome, $descricao, $valor, $quant_estoque, $familia)
    {
        //atribui os valores passados como parâmetros para as variáveis correspondentes
        $this->id = $id;
        $this->nome = $nome;
        $this->descricao = $descricao;
        $this->valor = $valor;
        $this->quant_estoque = $quant_estoque;
        $this->familia = $familia;
    }
}
?>
