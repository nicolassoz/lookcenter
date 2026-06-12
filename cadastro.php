<?php 
// adicionar a parte de cima do site
include "includes/menu.php"
?>

<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>LookCenter | Cadastro</title>
    <!-- links para o bootstrap, img e style -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Playfair+Display:wght@700&family=Poppins:wght@300;400;600&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="assets/css/style.css">
    
</head>
<body>

<main class="container mt 5">

    <h2 class="text-center mb-5" style="color: var(--primary-gold)">Faça seu Login</h2>

    <form class="card ">

        <div class="row m-1">
            <div class="col-md-4 mb-3">
                <p  style="color: var(--light-gray)">Nome</p>
                <input type="text" class="form-control" id="nomeCad">
            </div>

            <div class="col-md-4 mb-3">
                <p  style="color: var(--light-gray)">SobreNome</p>
                <input type="text" class="form-control" id="nomeCad">
            </div>

            <div class="col-md-4 mb-3">
                <p  style="color: var(--light-gray)">Email</p>
                <input type="email" class="form-control" id="emailCad">
            </div>
                    
            <div class="col-md-4 mb-3">
                 <p  style="color: var(--light-gray)">Telefone (opcional)</p>
                <input type="text" class="form-control" id="telCad">
            </div>            
                    
            <div class="col-md-4 mb-3" >
                 <p  style="color: var(--light-gray)">Endereço</p>
                <input type="text" class="form-control" id="enderecoCad">
            </div>

            <div class="col-md-4 mb-3" >
                 <p  style="color: var(--light-gray)">Senha</p>
                <input type="text" class="form-control" id="enderecoCad">
            </div>

            <div class="justify-content-Center row">
                    <div class="card-body text-center">
                      <a href="cadastro.php" class="btn btn-outline-warning btn-sm">cadastrar-se</a>
                    </div>
            </div>
        </div>

    </form>

</main>

<?php include "includes/offcar.php" ?>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>

<?php
// adicionar o footer, a parte de baixo do site
include "includes/footer.php"
?>