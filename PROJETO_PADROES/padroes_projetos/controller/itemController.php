<?php
require_once './repository/itemRepository.php'; //inclui o arquivo que contêm a lógica de repositório para itens

class ItemController //define a classe ItemController
{
    private $itemRepository; //cria uma variável privada que armazena um objeto do tipo ItemRepository

    function __construct($itemRepository) // o construtor recebe um objeto do tipo ItemRepository como argumento e atribui esse objeto à variável privada $itemRepository
    {
        $this->itemRepository = $itemRepository;
    }

    public function getItens() //chama a função 'getItens' do objeto ItemRepository e converte o resultado para um array
    {
        return iterator_to_array($this->itemRepository->getItens());
    }

    public function getItensPorNome($nome) //chama a função 'getItensPorNome' do objeto ItemRepository, passando '$nome' como argumento, e converte o resultado para um array
    {
        return iterator_to_array($this->itemRepository->getItensPorNome($nome));
    }
}
?>