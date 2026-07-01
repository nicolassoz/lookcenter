<!-- pagina da camisa jersey blunt querubins-->

<?php 
// adicionar a parte de cima do site
include "../../includes/menu.php"
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
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.13.1/font/bootstrap-icons.min.css">
    <link rel="stylesheet" href="../../style.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/css/all.min.css">
</head>
<body style="color: white;">

<div class="container">

    <div class="row">
        <div class="card col-md-5 m-3">
            <img src="../../roupas/calcas/Calça_Jeans_Baggy_Black_Acid_frente.jpg" alt="Calca">
        </div>

        <div class="col-md-5 m-3">
            <p style="color: var(--accent-gold);">Calça</p>
            <h2>Calça Jeans Black Topside</h2>
            <H3 style="color: var(--accent-gold); font-size:45px;">R$215,64</H3>
            <p>ou 3x de 71,88</p>

            <p>Calça jeans com corte volumoso e caimento pesado em lavagem cinza-escura.</p>
            <ul>
                <li>???</li>
                <li>???</li>
                <li>???</li>
                <li>???</li>
            </ul>
            <p>COR: Preto</p>
            <p class="mb-0">TAMANHO:</p>
            <div class="size-options mb-3">
                <input type="checkbox" class="btn-check" id="sizeP" autocomplete="off">
                <label class="btn btn-outline-light" for="sizeP">P</label>

                <input type="checkbox" class="btn-check" id="sizeM" autocomplete="off">
                <label class="btn btn-outline-light" for="sizeM">M</label>

                <input type="checkbox" class="btn-check" id="sizeG" autocomplete="off">
                <label class="btn btn-outline-light" for="sizeG">G</label>

                <input type="checkbox" class="btn-check" id="sizeGG" autocomplete="off">
            <label class="btn btn-outline-light" for="sizeGG">GG</label>
            </div>

            <div class="row mb-3">

                <div class="col-md-5">
                    <button class="btn" type="button" style="background:var(--accent-gold); color:black"><i class="bi bi-bag"></i> comprar agora</button>
                </div>

                <div class="col-md-6">
                    <button class="btn" type="button" style="background:transparent; color:white; border:solid 2px; color:white;"><i class="bi bi-cart"></i> adicionar ao carrinho</button>
                </div>
            </div>
   
            <p class="mb-0" style="color: var(--accent-gold);"><i class="bi bi-truck"></i> frete gratis</p>
            <p>nas compras acima de R$250,00</p>
        </div>

        <div class="col-md-6">
            <table class="table table-bordered">
            <tbody>
                <tr>
                <td style="background:transparent; color:white;"><i style="font-size: 20px;" class="bi bi-shield-check"></i> compra segura <br> seus dados protegidos</td>
                <td style="background:transparent; color:white;"><i style="font-size: 20px;" class="bi bi-award"></i> qualidade premium <br> produtos de alta qualidade</td>
                <td style="background:transparent; color:white;"><i style="font-size: 20px;" class="bi bi-truck"></i> envio so para <br>cidade de <span style="color: var(--accent-gold);">são paulo</span></td>
                </tr>
            </tbody>
            </table>
        </div>

    </div>

</div>
<!-- area do carrinho (offcanva) -->
<?php include "../../includes/offcar.php" ?>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>

<?php
// adicionar o footer, a parte de baixo do site
include "../../includes/footer.php"
?>