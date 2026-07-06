<!-- pagina de login onde o usuario realiza o login-->

<?php
ini_set('display_errors',1);
ini_set('display_startup_errors',1);
error_reporting(E_ALL);

session_start(); // iniciar a sessão ou atualizar a sessão aberta

// evitar acesso se já estiver logado
if (isset($_SESSION['usuario_id'])) 
    {
    $destino = ($_SESSION['nivel_id'] == 1) ? "painelAdm.php" : "perfil.php"; // estrutura do if ternário
    header("location: $destino");
    }

require "classes/Usuario.php";

$msg = "";
if($_SERVER['REQUEST_METHOD']==="POST")
    {
        $email = filter_input(INPUT_POST, "email",FILTER_VALIDATE_EMAIL);
        $senha = $_POST["senha"]?? null;
        if(!$email || !$senha)
            {
                $msg = "prencha os dados corretamente";
            }
            
            $usuario = Usuario::EfetuarLogin($email, $senha);
            // var_dump($usuario);
            // exit;
            if(count($usuario)>0)
                {
                    $_SESSION['usuario_id'] = $usuario['id'];
                    $_SESSION['nome'] = $usuario['nome'];
                    $_SESSION['nivel_id'] = $usuario['nivel_id'];

                        if($usuario['nivel_id']==1)
                            {
                                header('location: painelAdm.php');
                            }
                            else
                                {
                                    header('location: perfil.php');
                                }
                }
    }
// adicionar a parte de cima do site
include "includes/menu.php";
?>

<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>LookCenter | login</title>
    <!-- links para o bootstrap, img e style -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Playfair+Display:wght@700&family=Poppins:wght@300;400;600&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="style.css">

</head>

<body>

    <div class="container">

        <h2 class="text-center mb-5" style="color: var(--primary-gold)">Faça seu Login</h2>

        <!-- card de login -->
        <div class="justify-content-Center row">
            <div class="col-md-4 card h-100">
                <div class="card-body text-center">
                    <form method="POST">

                        <p style="color: var(--light-gray)">Email</p>
                        <!-- campo para inserir o email -->
                        <input type="email" name="email" class="form-control" required placeholder="Ex: email.123@gmail.com">
                        <p></p>

                        <p style="color: var(--light-gray)">Senha</p>
                        <!-- campo para inserir a senha -->
                        <input type="password" name="senha" class="form-control" required id="">
                        <p></p>

                        <!-- botão que realizarar o login -->
                        <button class="btn btn-outline-warning btn-sm">login</button>
                        <p></p>
                    </form>

                    <!-- botão que mandara para area de realizar o cadastro -->
                    <a href="cadastro.php" class="btn btn-outline-warning btn-sm">se-cadastrar</a>
                    <!-- botão que mandara para a area que realizara a mudança de senha -->
                    <ul class="navbar-nav ms-auto mt-2">
                        <li class="nav-item "><a class="nav-link" href="alterarSenha.php">Alterar senha</a></li>
                    </ul>
                </div>
            </div>
        </div>
    </div>

    <!-- area do carrinho (offcanva) -->
    <?php include "includes/offcar.php" ?>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>

</html>

<?php
// adicionar o footer, a parte de baixo do site
include "includes/footer.php"
?>