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

    <style>

    .avaliacao {
    display: flex;
    gap: 10px;
    justify-content: center;
}

.estrela {
    font-size: 35px;
    color: #ffffff; /* cinza quando não selecionada */
    cursor: pointer;
    transition: 0.3s;
}

.estrela:hover,
.estrela.ativa {
    color: #d4af37; /* dourado */
}

    </style>
    
</head>
<body>


<div class="container">

    <h2 class="text-center mb-3" style="color: var(--primary-gold)">seu feedback é importante</h2>

    <p class="text-center footer-text">queremos saber a sua opniao para continuar melhorando.</p>
    <p class="text-center footer-text">Deixe seu feedback abaixo</p>

    <div class="justify-content-Center row">
        <div class="col-md-5 card h-100">
                <div class="card-body">
                    <p></p>
                    <p style="color: var(--light-gray)">Nome</p>
                    <input type="password" class="form-control" id="senhaLogin" placeholder="Ex: joão souza">
                    <p  class="mt-2" style="color: var(--light-gray)">Email</p>
                    <input type="email" class="form-control" id="emailLogin" placeholder="Ex: email.123@gmail.com">

                    <p style="color: var(--light-gray)" class="mt-3">Como você avalia sua experiência?</p>

                    <div class="avaliacao justify-content-start">
                        <span class="estrela" data-value="1">&#9733;</span>
                        <span class="estrela" data-value="2">&#9733;</span>
                        <span class="estrela" data-value="3">&#9733;</span>
                        <span class="estrela" data-value="4">&#9733;</span>
                        <span class="estrela" data-value="5">&#9733;</span>
                    </div>

                    <input type="hidden" id="nota" name="nota" value="0">

                    <label for="cometFeed" class="form-label" style="color: var(--light-gray)">seu feedback</label>
                    <textarea class="form-control mb-3" id="comentFeed" rows="3" placeholder="Conte-nos o que achou"></textarea>
                     
                            <div class="text-center">
                                <a href="#" class="btn btn-outline-warning btn-sm">Enviar FeedBack</a>
                            </div>
                </div>
        </div>
    </div>
</div>

<main class="container my-5" id="produtos">
        <h2 class="text-center mb-5" style="color: var(--primary-gold)">outros feedback</h2>
        
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

        </div>
    </main>
    
<?php include "includes/offcar.php" ?>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>

<script>

const estrelas = document.querySelectorAll(".estrela");
const nota = document.getElementById("nota");

estrelas.forEach((estrela) => {
    estrela.addEventListener("click", () => {
        const valor = estrela.dataset.value;
        nota.value = valor;

        estrelas.forEach((e) => {
            if (e.dataset.value <= valor) {
                e.classList.add("ativa");
            } else {
                e.classList.remove("ativa");
            }
        });
    });
});

</script>

</body>
</html>
<?php include "includes/footer.php"; ?>