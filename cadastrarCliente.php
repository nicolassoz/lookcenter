<?php
    session_start();

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
    $logradouro = filter_input(INPUT_POST,'endereco', FILTER_UNSAFE_RAW);
    $numero = filter_input(INPUT_POST,'numero', FILTER_UNSAFE_RAW);
    $complemento = filter_input(INPUT_POST,'complemento', FILTER_UNSAFE_RAW);
    $bairro = filter_input(INPUT_POST,'bairro', FILTER_UNSAFE_RAW);
    $senha = filter_input(INPUT_POST, 'senha', FILTER_UNSAFE_RAW);
    $confirmar_senha = filter_input(INPUT_POST,'confirmar_senha', FILTER_UNSAFE_RAW);

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
    if(!$cpf || strlen($cpf) != 11)
        {
            header("location: contratar.php?erro=Cpf inválido. Digite 11 números.");
            exit();
        }
    if(!$cep || strlen($cep) !=8)
        {
            header("location: cadastro.php?erro=cep inválido digite 8 numeros");
            exit();
        }
    if(!$logradouro || strlen($logradouro) < 5)
        {
            header("location: cadastro.php?erro=Endereço invelido.");
            exit();
        }
    if ($senha != $confirmar_senha)
    {
    header("Location: cadastro.php?erro=As senhas não coincidem.");
    exit();
    }
    if(!$numero || strlen($numero))
        {
            header("Location: cadastro.php?erro=Número inválido.");
            exit();
        }

    if(!$complemento || strlen(!$complemento))

    if(!$bairro || strlen(!$bairro))
        {
            header("Location: cadastro.php?erro=Bairro inválido.");
            exit();
        }

    try
    {
        $usuarioBanco = new Usuario();
        if($usuarioBanco->buscarPorEmail($email)==false)
            {
                $usuario = new Usuario();
                $usuario->setNome($nome);
                $usuario->setEmail($email);
                $usuario->setSenha($senha);
                $usuario->setNivelId(2);
                $usuario->setAtivo(true);
                if(!$usuario->inserir())
                    {
                        header("location: cadastro.php?erro=Erro ao cadastrar o Usuário");
                        exit();
                    }
                    $usuario_id = $usuario->getId();
            }
            else
                {
                    $usuario_id = $usuarioBanco->getId();
                }

        $cliente = new Cliente();
        if($cliente->buscarPorId($usuario_id)==false)
            {
                $cliente = new Cliente();
                $cliente->setNome($nome);
                $cliente->setCpf($cpf);
                $cliente->setTelefone($telefone);
                $cliente->setEmail($email);      
                $cliente->setAtivo(true);  
                $cliente->setUsuarioId($usuario_id);
                if(!$cliente->Inserir())
                    {
                        header("location: cadastro.php?erro=Erro ao cadastrar o cliente");
                        exit();
                    }
            }
            $cliente_id = $cliente->getId();

            $endereco = new Endereco();
            $endereco->setCep($cep);
            $endereco->setLogradouro($logradouro);
            $endereco->setNumero($numero);
            $endereco->setComplemento($complemento);
            $endereco->setBairro($bairro);
            $endereco->Inserir();

            header("location: cadastro.php?sucesso=1");
}
        catch (Exception $e) 
        {
            error_log("Erro em processa_cadastro.php: ". $e->getMessage());
            header("Location: cadastro.php?erro=Erro ao processar o cadastro. Tente novamente.");
            exit;
        }
    
?>