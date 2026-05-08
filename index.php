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

<!-- mostrar a imagem com o nome (esqueci o nome disso) -->
    <section class="hero">
        <div class="container">
            <h1 class="display-1">LookCenter</h1>
            <p class="lead mb-4 text-light">Lorem ipsum dolor sit amet, consectetur adipiscing elit. Elegância em cada detalhe.</p>
            <a href="#produtos" class="btn btn-gold">VER COLEÇÃO</a>
        </div>
    </section>

    <!-- as roupas que serão destaque -->
    <main class="container my-5" id="produtos">
        <h2 class="text-center mb-5" style="color: var(--primary-gold)">Destaques</h2>
        
        <!-- roupa 1 -->
        <div class="row">
            <div class="col-md-4">
                <div class="card h-100">
                    <img src="https://images.unsplash.com/photo-1515886657613-9f3515b0c78f?auto=format&fit=crop&w=500&q=60" class="card-img-top" alt="Produto">
                    <div class="card-body text-center">
                        <h5 class="card-title">Lorem Ipsum</h5>
                        <p class="card-text text-light">Consectetur adipiscing elit sed do eiusmod.</p>
                        <p class="price">R$ 199,90</p>
                        <button class="btn btn-outline-warning btn-sm">Comprar Agora</button>
                    </div>
                </div>
            </div>

            <!-- roupa 2 -->
            <div class="col-md-4">
                <div class="card h-100">
                    <img src="https://images.unsplash.com/photo-1539109136881-3be0616acf4b?auto=format&fit=crop&w=500&q=60" class="card-img-top" alt="Produto">
                    <div class="card-body text-center">
                        <h5 class="card-title">Dolor Sit Amet</h5>
                        <p class="card-text text-light">Tempor incididunt ut labore et dolore magna.</p>
                        <p class="price">R$ 250,00</p>
                        <button class="btn btn-outline-warning btn-sm">Comprar Agora</button>
                    </div>
                </div>
            </div>

            <!-- roupa 3 -->
            <div class="col-md-4">
                <div class="card h-100">
                    <img src="https://images.unsplash.com/photo-1483985988355-763728e1935b?auto=format&fit=crop&w=500&q=60" class="card-img-top" alt="Produto">
                    <div class="card-body text-center">
                        <h5 class="card-title">Sed Eiusmod</h5>
                        <p class="card-text text-light">Ut enim ad minim veniam quis nostrud.</p>
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
        
        <!-- roupa 1 -->
        <div class="row">
            <div class="col-md-4">
                <div class="card h-100">
                    
                    <div class="card-body text-center">
                        <h5 class="card-title">Lorem Ipsum</h5>
                        <p class="card-text text-light">Lorem ipsum dolor sit amet consectetur adipisicing.</p>
                    </div>
                </div>
            </div>

            <!-- roupa 2 -->
            <div class="col-md-4">
                <div class="card h-100">
                    
                    <div class="card-body text-center">
                        <h5 class="card-title">Lorem sit</h5>
                        <p class="card-text text-light">Lorem ipsum, dolor sit amet consectetur adipisicing elit. Illum.</p>
                    </div>
                </div>
            </div>

            <!-- roupa 3 -->
            <div class="col-md-4">
                <div class="card h-100">
                    
                    <div class="card-body text-center">
                        <h5 class="card-title">Lorem dolor</h5>
                        <p class="card-text text-light">Lorem ipsum dolor sit amet, consectetur adipisicing elit. Vel ipsa itaque velit.</p>
                    </div>
                </div>
            </div>
        </div>
    </main>
    

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>

<!-- adicionar o footer, a parte de baixo do site -->
<?php 
include "includes/footer.php";
?>