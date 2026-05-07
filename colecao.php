<?php 
include "includes/menu.php"
?>
<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Playfair+Display:wght@700&family=Poppins:wght@300;400;600&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="assets/css/style.css">
</head>
<body>

<main class="container my-5" id="produtos">
        <h2 class="text-center mb-5" style="color: var(--primary-gold)">lamçamentos</h2>
        
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
    
</body>
</html>

<?php 
include "includes/footer.php"
?>