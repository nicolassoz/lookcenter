
<!-- pagina de login onde o usuario realiza o login-->

<?php 
// adicionar a parte de cima do site
include "includes/menu.php"
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
                    <p  style="color: var(--light-gray)">Email</p>
                    <!-- campo para inserir o email -->
                    <input type="email" class="form-control" id="emailLogin" placeholder="Ex: email.123@gmail.com">
                    <p></p>
                    <p style="color: var(--light-gray)">Senha</p>
                    <!-- campo para inserir a senha -->
                    <input type="password" class="form-control" id="senhaLogin">
                    <p></p>
                    <!-- botão que realizarar o login -->
                    <button class="btn btn-outline-warning btn-sm">login</button><p></p>
                    <!-- botão que mandara para area de realizar o cadastro -->
                    <a href="cadastro.php" class="btn btn-outline-warning btn-sm">se-cadastrar</a>
                    <!-- botão que mandara para a area que realizara a mudança de senha -->
                    <ul class="navbar-nav ms-auto mt-2">
                        <li class="nav-item "><a class="nav-link" href="#">Alterar senha</a></li>
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