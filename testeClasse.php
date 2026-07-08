<?php
error_reporting(E_ALL);
ini_set('display_errors', 1);

include_once "config/conexao.php";
include_once "classes/Pedido.php";

$lista = Pedido::Listar();

echo "<pre>";
print_r($lista);
echo "</pre>";
