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
    <link rel="stylesheet" href="assets/css/style.css">
    
</head>
<body>

<div class="container">

    <h2 class="text-center mb-5" style="color: var(--primary-gold)">Faça seu Login</h2>


    <div class="justify-content-Center row">
        <div class="col-md-4 card h-100">
                <div class="card-body text-center">
                    <p  style="color: var(--light-gray)">Email</p>
                    <input type="email" class="form-control" id="emailLogin">
                    <p></p>
                    <p style="color: var(--light-gray)">Senha</p>
                    <input type="password" class="form-control" id="senhaLogin">
                    <p></p>
                    <button class="btn btn-outline-warning btn-sm">login</button><p></p>
                    <!-- <button  class="btn btn-outline-warning btn-sm">se-cadastrar</button> -->
                    <a href="cadastro.php" class="btn btn-outline-warning btn-sm">se-cadastrar</a>
                </div>
        </div>
    </div>
</div>

<?php include "includes/offcar.php" ?>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>

<?php
// adicionar o footer, a parte de baixo do site
include "includes/footer.php"
?>