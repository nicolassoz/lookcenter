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

        <div class="row">
            <div class="col-md-6 mb-3">
                <p  style="color: var(--light-gray)">Nome</p>
                <input type="text" class="form-control" id="nomeCad">
            </div>

            <div class="col-md-6 mb-3">
                <p  style="color: var(--light-gray)">Email</p>
                <input type="email" class="form-control" id="emailCad">
            </div>
                    
            <div class="col-md-6 mb-3">
                 <p  style="color: var(--light-gray)">Telefone</p>
                <input type="text" class="form-control" id="telCad">
            </div>            
                    
            <div class="col-md-6 mb-3" >
                 <p  style="color: var(--light-gray)">Endereço</p>
                <input type="text" class="form-control" id="enderecoCad">
            </div>

            <div class="justify-content-Center row">
                    <div class="card-body text-center">
                      <a href="cadastro.php" class="btn btn-outline-warning btn-sm">se-cadastrar</a>
                    </div>

            </div>
        </div>

    </form>

</main>
    





<!-- <main class="container mt-5">
  <h2 class="text-center mb-4" style="color: var(--primary-gold)">faça seu cadastro</h2>

  <form class="card h-100">

    <div class="row">

      <div class="col-md-6 mb-3">
        <label class="form-label">Nome Completo</label>
        <input type="text" name="nome" class="form-control" required minlength="3">
      </div>

      <div class="col-md-6 mb-3">
        <label class="form-label">E-mail</label>
        <input type="email" name="email" class="form-control" required>
      </div>

      <div class="col-md-6 mb-3">
        <label class="form-label">Telefone</label>
        <input type="text" name="telefone" class="form-control" required minlength="8" maxlength="20">
      </div>

      <div class="col-md-6 mb-3">
        <label class="form-label">CPF (opcional)</label>
        <input type="text" name="cpf" class="form-control" minlength="11" maxlength="14">
      </div>

      <div class="col-md-12 mb-3">
        <label class="form-label">Endereço</label>
        <input type="text" name="endereco" class="form-control" required minlength=5>
      </div>

      <div class="col-md-6 mb-3">
        <label class="form-label">Data Preferida (opcional)</label>
        <input type="date" name="data_preferida" class="form-control">
      </div>

      <div class="col-md-6 mb-3">
        <label class="form-label">Serviço</label>
        <select name="servicos_ids[]" class="form-select" multiple required size="5">
        </select>
        <small class="text-muted">
          Para selecionar mais de um: segure <strong>CTRL</strong>(Windows) ou <strong>CMD</strong>(mac)
        </small>
      </div>

      <div class="col-md-12 mb-3">
        <label class="form-label">Descrição do Problema</label>
        <textarea name="descricao" class="form-control" rows="4" required minlength="10"></textarea>
      </div>

    </div>

    <button class="btn btn-success w-100">Enviar Solicitação</button>
  </form>
</main> -->










</body>
</html>

<?php
// adicionar o footer, a parte de baixo do site
include "includes/footer.php"
?>