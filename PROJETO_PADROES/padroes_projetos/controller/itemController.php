<?php
class ItemController  //define a classe ItemController
{
    private $itemRepository; //cria uma variável privada que armazena um objeto do tipo ItemRepository

    function __construct(ItemControllerInterface $itemRepository) // o construtor recebe um objeto do tipo ItemRepository como argumento e atribui esse objeto à variável privada $itemRepository
    {
        $this->itemRepository = $itemRepository;
    }

    public function mostrarListagemProdutos(){require_once './model/item.php';
        $nome = isset($_POST['search']) ? $_POST['search'] : null;//verifica se a variável POST 'search' está definida, se estiver ele faz a pesquisa por nome, caso não ele apresenta todos os itens cadastrados

        if ($nome !== null) { //se $nome não for null, chama a função getItensPorNome do controlador de itens. Se for null, chama a função getItens do controlador de itens
            $itens = $this->getItensPorNome($nome);
        } else {
            $itens = $this->getItens();
        }

        include './view/listar_itens.php';
    }
}
?>