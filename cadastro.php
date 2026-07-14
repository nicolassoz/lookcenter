<?php 
session_start();
include_once "classes/Cliente.php";
include_once "classes/Usuario.php";
include_once "classes/Endereco.php";
if(!isset($_SESSION['csrf_token'])) {
    $_SESSION['csrf_token'] = bin2hex(random_bytes(32));
}

// adicionar a parte de cima do site
include "includes/menu.php";
?>

<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>LookCenter | Cadastro</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Playfair+Display:wght@700&family=Poppins:wght@300;400;600&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="style.css">
</head>
<body>

<main class="container mt-5">

    <h2 class="text-center mb-5" style="color: var(--primary-gold)">Faça seu Cadastro</h2>

    <?php if(isset($_GET['erro'])): ?>
        <div class="alert alert-danger text-center"><?= htmlspecialchars($_GET['erro']) ?></div>
    <?php endif; ?>

    <?php if(isset($_GET['sucesso'])): ?>
        <div class="alert alert-success text-center">Cadastro realizado com sucesso!</div>
    <?php endif; ?>

    <form class="card" action="cadastrarCliente.php" method="POST">

        <input type="hidden" name="csrf_token" value="<?= $_SESSION['csrf_token'] ?>">

        <div class="row m-1">
            <div class="col-md-4 mb-3">
                <label class="form-label" style="color: var(--light-gray)">Nome</label>
                <input type="text" name="nome" class="form-control" id="nomeCad" placeholder="Ex: joão souza" required>
            </div>

            <div class="col-md-4 mb-3">
                <label class="form-label" style="color: var(--light-gray)">Cpf</label>
                <input type="text" name="cpf" class="form-control" id="cpfCad" placeholder="Ex: 111.111.111-11" required>
            </div>

            <div class="col-md-4 mb-3">
                <label class="form-label" style="color: var(--light-gray)">Data de Nascimento</label>
                <input type="date" name="data_nasc" class="form-control" id="dataNascCad" required>
            </div>

            <div class="col-md-4 mb-3">
                <label class="form-label" style="color: var(--light-gray)">Email</label>
                <input type="email" name="email" class="form-control" id="emailCad" placeholder="Ex: email.123@gmail.com" required>
            </div>
                    
            <div class="col-md-2 mb-3">
                 <label class="form-label" style="color: var(--light-gray)">Telefone (opcional)</label>
                <input type="text" name="telefone" class="form-control" id="telCad" placeholder="Ex: (11)99999-9999">
            </div>
            
            <div class="col-md-2 mb-3" >
                 <label class="form-label" style="color: var(--light-gray)">CEP</label>
                <input type="text" name="cep" class="form-control" id="cepCad" placeholder="Ex: 11111-111" required>
            </div>
                    
            <div class="col-md-4 mb-3" >
                 <label class="form-label" style="color: var(--light-gray)">Logradouro</label>
                <input type="text" name="endereco" class="form-control" id="logradouroCad" placeholder="Ex: rua itaquera" required>
            </div>

            <div class="col-md-2 mb-3" >
                 <label class="form-label" style="color: var(--light-gray)">Numero</label>
                <input type="text" name="numero" class="form-control" id="numeCad" placeholder="Ex: 123" required>
            </div>

            <div class="col-md-4 mb-3" >
                 <label class="form-label" style="color: var(--light-gray)">Complemento (opcional)</label>
                <input type="text" name="complemento" class="form-control" id="compCad" placeholder="bloco A, ap 11">
            </div>

            <div class="col-md-4 mb-3" >
                 <label class="form-label" style="color: var(--light-gray)">Bairro</label>
                <input type="text" name="bairro" class="form-control" id="bairroCad" placeholder="Ex: itaquera" required>
            </div>

            <div class="col-md-4 mb-3" >
                 <label class="form-label" style="color: var(--light-gray)">Senha</label>
                <input type="password" name="senha" class="form-control" id="senhaCad" required>
            </div>

            <div class="col-md-4 mb-3" >
                 <label class="form-label" style="color: var(--light-gray)">Confirme a Senha</label>
                <input type="password" name="confirma_senha" class="form-control" id="confirmaSenhaCad" required>
            </div>

            <div class="justify-content-center row">
                <div class="card-body text-center">
                    <button type="submit" class="btn btn-outline-warning btn-sm">Cadastrar-se</button>
                </div>
            </div>
        </div>

    </form>

</main>

<?php  include "includes/offcar.php" ?>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>

<?php
// adicionar o footer, a parte de baixo do site
include "includes/footer.php"
?>