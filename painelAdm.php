
<!-- pagina da area do adm (so o adm pode acessar esta area)-->

<?php 
// adicionar a parte de cima do site
include "includes/menu.php";
?>
<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>LookCenter | Moda e Estilo</title>
    <!-- links para o bootstrap, img e style -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Playfair+Display:wght@700&family=Poppins:wght@300;400;600&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="assets/css/style.css">
    
</head>
<body>
<!-- titulo -->
<div class="container mt-3" style="color: var(--primary-gold)">
    <h2>Olá Administrador!</h2>
    <p class="footer-text">Bem vindo ao painel da loja.</p>
</div>

<!-- area do carrinho (offcanva) -->
<?php include "includes/offcar.php" ?>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>

</body>
</html>

<!-- adicionar o footer, a parte de baixo do site -->
<?php include "includes/footer.php"; ?>