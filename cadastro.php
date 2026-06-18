
<!-- pagina de cadastro onde o usuario realiza o cadastro-->

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

    <h2 class="text-center mb-5" style="color: var(--primary-gold)">Faça seu Cadastro</h2>

    <!-- card de cadastro -->
    <form class="card ">

        <div class="row m-1">
            <!-- campo para inserir o nome -->
            <div class="col-md-4 mb-3">
                <p  style="color: var(--light-gray)">Nome</p>
                <input type="text" class="form-control" id="nomeCad" placeholder="Ex: joão souza">
            </div>

            <!-- campo para inserir o CPF -->
            <div class="col-md-4 mb-3">
                <p  style="color: var(--light-gray)">Cpf</p>
                <input type="text" class="form-control" id="emailCad" placeholder="Ex: 111.111.111-11">
            </div>

            <!-- campo para inserir o email -->
            <div class="col-md-4 mb-3">
                <p  style="color: var(--light-gray)">Email</p>
                <input type="email" class="form-control" id="emailCad" placeholder="Ex: email.123@gmail.com">
            </div>
                    
            <!-- campo para inserir o telefone -->
            <div class="col-md-2 mb-3">
                 <p  style="color: var(--light-gray)">Telefone (opcional)</p>
                <input type="text" class="form-control" id="telCad" placeholder="Ex: (11)99999-9999">
            </div>
            
            <!-- campo para inserir o CEP -->
            <div class="col-md-2 mb-3" >
                 <p  style="color: var(--light-gray)">CEP</p>
                <input type="text" class="form-control" id="enderecoCad" placeholder="Ex: 11111-111">
            </div>
                    
            <!-- campo para inserir o endereço -->
            <div class="col-md-4 mb-3" >
                 <p  style="color: var(--light-gray)">Endereço</p>
                <input type="text" class="form-control" id="enderecoCad" placeholder="Ex: rua. itaquera, n15">
            </div>

            <!-- campo para inserir o complemento -->
            <div class="col-md-4 mb-3" >
                 <p  style="color: var(--light-gray)">Complemento (opcional)</p>
                <input type="text" class="form-control" id="enderecoCad" placeholder="bloco A, ap 11">
            </div>

            <!-- campo para inserir o senha -->
            <div class="col-md-4 mb-3" >
                 <p  style="color: var(--light-gray)">Senha</p>
                <input type="text" class="form-control" id="enderecoCad">
            </div>

            <!-- campo para confirma a senha -->
            <div class="col-md-4 mb-3" >
                 <p  style="color: var(--light-gray)">confirme a Senha</p>
                <input type="text" class="form-control" id="enderecoCad">
            </div>

            <!-- botão para realiza o cadastro -->
            <div class="justify-content-Center row">
                    <div class="card-body text-center">
                      <a href="cadastro.php" class="btn btn-outline-warning btn-sm">cadastrar-se</a>
                    </div>
            </div>
        </div>

    </form>

</main>

<!-- area do carrinho (offcanva) -->
<?php include "includes/offcar.php" ?>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>

<?php
// adicionar o footer, a parte de baixo do site
include "includes/footer.php"
?>