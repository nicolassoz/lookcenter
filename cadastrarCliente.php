<?php
session_start();

require_once "classes/Cliente.php";
require_once "classes/Endereco.php";
require_once "classes/Usuario.php";

// 1. Verifica método POST e valida o Token CSRF
if ($_SERVER['REQUEST_METHOD'] !== "POST" || !isset($_POST['csrf_token']) || $_POST['csrf_token'] !== $_SESSION['csrf_token']) {
    header("location: cadastro.php?erro=Falha de segurança CSRF detectada.");
    exit();
}

// 2. Captura e limpa os dados
$nome = filter_input(INPUT_POST, 'nome', FILTER_SANITIZE_FULL_SPECIAL_CHARS);
$cpf = preg_replace('/\D/','', $_POST['cpf'] ?? "");
$email = filter_input(INPUT_POST, 'email', FILTER_VALIDATE_EMAIL);
$telefone = filter_input(INPUT_POST, 'telefone', FILTER_SANITIZE_FULL_SPECIAL_CHARS);
$cep = filter_input(INPUT_POST, 'cep', FILTER_UNSAFE_RAW);
$logradouro = filter_input(INPUT_POST, 'endereco', FILTER_UNSAFE_RAW);
$numero = filter_input(INPUT_POST, 'numero', FILTER_UNSAFE_RAW);
$complemento = filter_input(INPUT_POST, 'complemento', FILTER_UNSAFE_RAW);
$bairro = filter_input(INPUT_POST, 'bairro', FILTER_UNSAFE_RAW);
$senha = filter_input(INPUT_POST, 'senha', FILTER_UNSAFE_RAW);
$confirma_senha = filter_input(INPUT_POST, 'confirma_senha', FILTER_UNSAFE_RAW);

// NOVO: Captura a data de nascimento
$data_nasc = filter_input(INPUT_POST, 'data_nasc', FILTER_UNSAFE_RAW);

// 3. Validações
if(!$nome || strlen($nome) < 3) { header("location: cadastro.php?erro=Nome invalido."); exit(); }
if(!$email) { header("location: cadastro.php?erro=Email inválido."); exit(); }
if($telefone && strlen($telefone) < 8) { header("location: cadastro.php?erro=Telefone inválido."); exit(); }
if(!$cpf || strlen($cpf) != 11) { header("location: cadastro.php?erro=Cpf inválido. Digite 11 números."); exit(); }
if(!$cep || strlen($cep) != 8) { header("location: cadastro.php?erro=CEP inválido, digite 8 numeros."); exit(); }
if(!$logradouro || strlen($logradouro) < 5) { header("location: cadastro.php?erro=Endereço invalido."); exit(); }
if(!$numero) { header("location: cadastro.php?erro=Número é obrigatório."); exit(); }
if(!$bairro) { header("location: cadastro.php?erro=Bairro é obrigatório."); exit(); }

// Valida se a data de nascimento foi preenchida
if(!$data_nasc) { header("location: cadastro.php?erro=A data de nascimento é obrigatória."); exit(); }

// Valida se as senhas batem
if(!$senha || $senha !== $confirma_senha) { header("location: cadastro.php?erro=As senhas não coincidem."); exit(); }

try {
    $usuarioBanco = new Usuario();
    if($usuarioBanco->buscarPorEmail($email) == false) {
        $usuario = new Usuario();
        $usuario->setNome($nome);
        $usuario->setEmail($email);
        
        $senha_hash = password_hash($senha, PASSWORD_DEFAULT);
        $usuario->setSenha($senha_hash); 
        
        $usuario->setNivelId(2);
        $usuario->setAtivo(true);
        if(!$usuario->inserir()) {
            header("location: cadastro.php?erro=Erro ao cadastrar o Usuário");
            exit();
        }
        $usuario_id = $usuario->getId();
    } else {
        $usuario_id = $usuarioBanco->getId();
    }

    $cliente = new Cliente();
    if($cliente->buscarPorId($usuario_id) == false) {
        $cliente = new Cliente();
        $cliente->setNome($nome);
        $cliente->setCpf($cpf);
        $cliente->setTelefone($telefone);
        $cliente->setEmail($email);      
        $cliente->setAtivo(true);  
        $cliente->setUsuarioId($usuario_id);
        
        // NOVO: Adiciona a data de nascimento convertida para DateTime
        try {
            $data_obj = new DateTime($data_nasc);
            $cliente->setDataNasc($data_obj);
        } catch (Exception $e) {
            header("location: cadastro.php?erro=Formato de data inválido.");
            exit();
        }

        if(!$cliente->Inserir()) {
            header("location: cadastro.php?erro=Erro ao cadastrar o cliente");
            exit();
        }
    }
    $cliente_id = $cliente->getId();

    // DICA: O endereço também deveria ser salvo no banco aqui usando a classe Endereco!

    header("location: cadastro.php?sucesso=1");
    exit();

} catch (Exception $e) {
    error_log("Erro em processa_cadastro.php: ". $e->getMessage());
    header("Location: cadastro.php?erro=Erro interno ao processar o cadastro.");
    exit();
}


?>