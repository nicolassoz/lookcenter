<?php
require_once "classes/Cliente.php";
require_once "classes/Endereco.php";
require_once "classes/Usuario.php";

if ($_SERVER['REQUEST_METHOD'] !== "POST")
    {
        header("location: cadastro.php?erro=falha de segurança CSRF detectada.");
        exit();
    }

$nome = filter_input(INPUT_POST, 'nome', FILTER_SANITIZE_FULL_SPECIAL_CHARS);
$cpf = preg_replace('/\D/','',$_POST['cpf'] ?? "");
$email = filter_input(INPUT_POST, 'email', FILTER_VALIDATE_EMAIL);
$telefone = filter_input(INPUT_POST,'telefone', FILTER_SANITIZE_FULL_SPECIAL_CHARS);
$cep = filter_input(INPUT_POST,'cep', FILTER_UNSAFE_RAW);
$logradouro = filter_input(INPUT_POST,'endereço', FILTER_UNSAFE_RAW);
$numero = filter_input(INPUT_POST,'numero', FILTER_UNSAFE_RAW);
$complemento = filter_input(INPUT_POST,'complemento', FILTER_UNSAFE_RAW);
$bairro = filter_input(INPUT_POST,'bairro', FILTER_UNSAFE_RAW);
$senha = filter_input(INPUT_POST, 'senha', FILTER_UNSAFE_RAW);
$confirma_senha = filter_input(INPUT_POST,'confirma_senha', FILTER_UNSAFE_RAW);

if(!$nome || strlen($nome) <3)
    {
        header("location: cadastro.php?erro=Nome invalido.");
        exit();
    }
if(!$email)
    {
        header("location: cadastro.php?erro=Email inválido.");
        exit();
    }
if(!$telefone || strlen($telefone) < 8)
    {
        header("location: cadastro.php?erro=Telefone inválido.");
        exit();
    }
if(!$cpf && strlen($cpf) != 11)
    {
         header("location: contratar.php?erro=Cpf inválido. Digite 11 números.");
            exit();
    }
if(!$logradouro || strlen($logradouro) < 5)
    {
        header("location: cadastro.php?erro=Endereço invelido.");
        exit();
    }
?>