<?php
interface ItemControllerInterface{
    public function getItens(): array;
    public function getItensPorNome(string $nome): array;
}
?>