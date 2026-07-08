<?php
error_reporting(E_ALL);
ini_set('display_errors', 1);

include_once "config/conexao.php";
include_once "classes/Produto.php";

// $lista = Produto::Listar();

// echo "<pre>";
// print_r($lista);
// echo "</pre>";

$produto = new Produto();

$produto->setNome("Camiseta Básica");
$produto->setDescricao("Camiseta 100% algodão");
$produto->setPreco(59.90);
$produto->setCategoriaId(1);
$produto->setEstoqueMinimo(10);
$produto->setDesconto(5.00);
$produto->setDataCad(new DateTime());
$produto->setDescontinuado(false);

if ($produto->Inserir()) {
    echo "Produto inserido com sucesso!<br>";
    echo "ID: " . $produto->getId_Produto();
} else {
    echo "Erro ao inserir o produto.";
}


?>