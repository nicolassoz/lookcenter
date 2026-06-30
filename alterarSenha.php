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

    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/css/all.min.css">

    <style>
        /* Painel Principal de Pedidos */
        .orders-panel {
            background-color: #111;
            border: 1px solid var(--primary-gold);
            border-radius: 10px;
            padding: 25px;
        }

        .orders-panel p {
            color: var(--light-gray);
            font-size: 0.9rem;
        }

        .a
        {
        background: transparent; 
        border: 1px solid; 
        color: #f5f5f5ff;
        }
    </style>
</head>

<body>

        <!-- cada area deverar aparecer uma de cada vez -->
    <div class="container mt-3">
        <div class="row">
                <h2 class="text-center mb-5" style="color: var(--primary-gold)">altere sua senha</h2>
            
            <div class="justify-content-Center row">
                <div class="col-md-5 orders-panel">

                    <!--1: o usuario devera digitar o email -->
                    <h5 style="color: var(--primary-gold)">Digite o seu E-mail</h5>
                    <p>Enviaremos um codigo de verificação para E-mail digitado abaixo</p>
                    <input type="email" class="form-control mb-3" id="emailLogin" placeholder="Ex: email.123@gmail.com">
                    <button class="btn btn-outline-warning btn-sm col-md-12">ENVIAR CÓDIGO</button>
                    <!--  -->


                    <!--2: o usuario deverar digitar o codigo que foi mandado para o email -->
                    <h5 class="mt-4" style="color: var(--primary-gold)">digite o codigo que foi enviado para o e-mail</h5>
                    <div class="text-center m-2">
                        <input class="a col-md-1" type="text" placeholder="   -"> <input class="a col-md-1" type="text" placeholder="   -"> <input class="a col-md-1" type="text" placeholder="   -"> 
                        <input class="a col-md-1" type="text" placeholder="   -"> <input class="a col-md-1" type="text" placeholder="   -"> <input class="a col-md-1" type="text" placeholder="   -">
                    </div> 
                    <!-- podera pedir um novo codigo -->
                    <p>Não recebeu o código? <a href="#" style="color: var(--primary-gold)">Reenviar código</a></p>
                    <!--  -->
                    

                    <!--3 o usuario agora poderar digita a nova senha -->
                    <h5 style="color: var(--primary-gold)">defina sua nova senha</h5>
                    <p class="mb-0">Nova senha:</p>
                    <input type="password" class="form-control" id="senhaLogin">
                    <p class="mb-0">a senha tem que ter no minimo</p>
                    <ul style="color: #fdfdfdda">
                        <li>8 caractere</li>
                        <li>letra maiuscula</li>
                        <li>caractere especial</li>
                        <li>numero</li>
                    </ul>
                    <p class="mb-0 mt-3">Confirmar nova senha:</p>
                    <input type="password" class="form-control mb-3" id="senhaLogin">
                    <button class="btn btn-outline-warning btn-sm col-md-12">alterar senha</button>
                    <!--  -->
                    
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