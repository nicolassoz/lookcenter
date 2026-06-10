<?php 
// adicionar a parte de cima do site
include "includes/menu.php";
?>

<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>LookCenter / sobre nós</title>
    <!-- links para o bootstrap, img e style -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Playfair+Display:wght@700&family=Poppins:wght@300;400;600&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="assets/css/style.css">
</head>
<body>

<!-- texto sobre a lookcenter -->
    <section class="heroN">
        <div class="container">
            <h2 class="display-1,">SOBRE NÒS</h2>
            <p class="lead mb-4 text-light">Nós somos a <b>LOKCENTER</b>, uma marca vibrantes que pilsa no ritmo das ruas. Nosso DNA é 100% streetwer e sport life, criado por e para jovens que não têm medo de ousar e expressar sua identidade única. Acreditamos que a moda é uma ferramenta poderosa de autoexpressão, e por isso, selecionamos curadoria de peças que unem o estilo urbano, o conforto e a atitude.</p>
            <p class="lead mb-4 text-light">Desde os moletons oversize aos acessórios com design exclusivo, cada item na <b>LOOKCENTER</b> conta uma <b>historia de liberdade, criatividade e autenticidade</b>. Mais que uma loja, somos uma <b>comunidade</b> que celebra a cultura jovem e a energia das cidades. vem fazer parte!</p>
            <a href="colecao.php" class="btn btn-gold">VER NOSSA COLEÇÃO</a>
        </div>
    </section>

<?php include "includes/offcar.php" ?>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>

<?php 
// adicionar o footer, a parte de baixo do site
include "includes/footer.php";
?>