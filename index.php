
<!-- pagina principal -->

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

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Playfair+Display:wght@700&family=Poppins:wght@300;400;600&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="style.css">

</head>
<body>

<!-- mostrar a imagem com o nome (esqueci o nome disso) -->


    <div id="carouselBannerIndex" class="carousel slide" data-bs-ride="carousel">
        <div class="carousel-indicators">
            <button type="button" data-bs-target="#carouselBannerIndex" data-bs-slide-to="0" class="active" aria-current="true" aria-label="Slide 1"></button>
            <button type="button" data-bs-target="#carouselBannerIndex" data-bs-slide-to="1" aria-label="Slide 2"></button>
            <button type="button" data-bs-target="#carouselBannerIndex" data-bs-slide-to="2" aria-label="Slide 3"></button>
        </div>
        <div class="carousel-inner">
            <div class="carousel-item active" data-bs-interval="4500">
                <a href="colecao.php">
                    <img src="assets/img/modelo_lookcenter.png" class="d-block w-100">
                </a>
            </div>
            <div class="carousel-item" data-bs-interval="4500">
                <img src="assets/img/banner_frete_lookcenter.png" class="d-block w-100">
            </div>
            <div class="carousel-item" data-bs-interval="4500">
                <img src="assets/img/banner_3peca_desc.png" class="d-block w-100">
            </div>
        </div>
        <button class="carousel-control-prev" type="button" data-bs-target="#carouselBannerIndex" data-bs-slide="prev">
            <span class="carousel-control-prev-icon" aria-hidden="true"></span>
            <span class="visually-hidden">Previous</span>
        </button>
        <button class="carousel-control-next" type="button" data-bs-target="#carouselBannerIndex" data-bs-slide="next">
            <span class="carousel-control-next-icon" aria-hidden="true"></span>
            <span class="visually-hidden">Next</span>
        </button>
    </div>

    

    <!-- area do carrinho (offcanva) -->
    <?php include "includes/offcar.php" ?>

    <!-- as roupas que serão destaque -->
    <main class="container my-5" id="produtos">
        <h2 class="text-center mb-5" style="color: var(--primary-gold)">Destaques</h2>
        
        <!-- roupa 1 -->
        <div class="row">
            <div class="col-md-4">
                <div class="card h-100">
                    <img src="roupas/camisas/camisa_neymar_jr_streetwear_preta_frente.png" class="card-img-top" alt="Produto">
                    <div class="card-body text-center">
                        <h5 class="card-title">neymar jr.</h5>
                        <p class="card-text text-light">camisa streerwear preta neymar jr.</p>
                        <p class="price">R$ 159,99</p>
                        <button class="btn btn-outline-warning btn-sm">Comprar Agora</button>
                    </div>
                </div>
            </div>

            <!-- roupa 2 -->
            <div class="col-md-4">
                <div class="card h-100">
                    <img src="roupas/moletons/Moletom_Red_Graphics_costa.jpg" class="card-img-top" alt="Produto">
                    <div class="card-body text-center">
                        <h5 class="card-title">moletom white Skull</h5>
                        <p class="card-text text-light">Moletom canguru branco com capuz e cordões pretos. Destaca-se pelas estampas em vermelho de esqueleto</p>
                        <p class="price">R$ 209,00</p>
                        <button class="btn btn-outline-warning btn-sm">Comprar Agora</button>
                    </div>
                </div>
            </div>

            <!-- roupa 3 -->
            <div class="col-md-4">
                <div class="card h-100">
                    <img src="roupas/calcas/Calça_Cargo_Jeans_Off-White_frente.jpg" class="card-img-top" alt="Produto">
                    <div class="card-body text-center">
                        <h5 class="card-title">calça cargo jeans Off-White</h5>
                        <p class="card-text text-light">Calça Cargo Jeans Off-White.</p>
                        <p class="price">R$ 175,00</p>
                        <button class="btn btn-outline-warning btn-sm">Comprar Agora</button>
                    </div>
                </div>
            </div>
        </div>
    </main>

    <!-- as avaliação dos clientes -->
    <main class="container my-5" id="produtos">
        <h2 class="text-center mb-5" style="color: var(--primary-gold)">Avaliação</h2>
        
        <!-- avaliação 1 -->
        <div class="row">
            <div class="col-md-4">
                <div class="card h-100">
                    
                    <div class="card-body text-center">
                        <h5 class="card-title">Carlos Henrique</h5>
                        <p class="card-text text-light">"Excelente loja! As roupas têm ótima qualidade, o atendimento foi muito bom e encontrei exatamente o que procurava. Com certeza voltarei a comprar."</p>
                    </div>
                </div>
            </div>

            <!-- avaliação 2 -->
            <div class="col-md-4">
                <div class="card h-100">
                    
                    <div class="card-body text-center">
                        <h5 class="card-title">Rafael Souza</h5>
                        <p class="card-text text-light">"Loja muito organizada e com várias opções de roupas masculinas. Os preços são justos e as peças vestem muito bem. Recomendo!"</p>
                    </div>
                </div>
            </div>

            <!-- avaliação 3 -->
            <div class="col-md-4">
                <div class="card h-100">
                    
                    <div class="card-body text-center">
                        <h5 class="card-title">Lucas Martins</h5>
                        <p class="card-text text-light">"Fiquei impressionado com a variedade de estilos disponíveis. O atendimento foi rápido e as roupas chegaram em perfeito estado. Ótima experiência de compra."</p>
                    </div>
                </div>
            </div>

            <div class="justify-content-Center row mt-3">
                    <div class="card-body text-center">
                      <a  href="feedback.php" class="btn btn-gold">dar feedback</a>
                    </div>
            </div>
        </div>
    </main>
    

    <!-- area do carrinho (offcanva) -->
    <?php include "includes/offcar.php" ?>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>

<!-- adicionar o footer, a parte de baixo do site -->
<?php 
include "includes/footer.php";
?>