
<!-- pagina da area de preferencias (o usuario podera escolher as preferencias)-->

<!-- adicionar a parte de cima do site -->
<?php include "includes/menu.php"; ?>
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

<!-- "navbar" que fica a esquerda pagina -->
<div class="container mt-3">
    <div class="row align-items-start">
        <div class="col-md-1">
            <ul class="navbar-nav ms-auto">
                        <li class="nav-item "><a class="nav-link" href="arPerfil.php">perfil</a></li>
                        <li class="nav-item "><a class="nav-link" href="arPedidos.php">pedidos</a></li>
                        <li class="nav-item "><a class="nav-link" href="arPreferencias.php">Preferências</a></li>
            </ul> 
        </div>

        <!-- card de preferencias -->
        <div class="col">
            <form class="card">
                <div class="row">
                    <!-- titulo -->
                    <div class="m-3" style="color: var(--light-gray)">
                        <h5>Preferências</h5>
                        <p>gerencie suas preferências para uma experiência personalizada</p>
                    </div>
                </div>

                <!-- o usuario poderar selecionar o(s) tamanho que aparecerar mais -->
                <div class="row m-1 justify-content-between">
                    <div class="col-md-5">
                        <p  style="color: var(--light-gray)">Tamanho</p>
                        <p style="color: var(--light-gray)">selecione os Tamanho que você usa com mais frequencia.</p>
                        <div class="filter-section mb-4">
                    <div class="d-flex flex-wrap gap-2">
                        <input type="checkbox" class="btn-check" id="sizeP" autocomplete="off">
                        <label class="btn btn-outline-light" for="sizeP">P</label>

                        <input type="checkbox" class="btn-check" id="sizeM" autocomplete="off">
                        <label class="btn btn-outline-light" for="sizeM">M</label>

                        <input type="checkbox" class="btn-check" id="sizeG" autocomplete="off">
                        <label class="btn btn-outline-light" for="sizeG">G</label>

                        <input type="checkbox" class="btn-check" id="sizeGG" autocomplete="off">
                        <label class="btn btn-outline-light" for="sizeGG">GG</label>
                    </div>
                </div>
                    </div>

                    <!-- onde poderar escolher o endereço principal -->
                    <div class="col-md-5">
                        <p style="color: var(--light-gray)">Endereço</p> <!-- aqui ira aparecer o primeiro endereço que foi cadastrado-->
                        <p style="color: var(--light-gray)">defina seu endereço principal para facilitar suas compras.</p>
                        <select id="inputState" class="form-select">
                            <option selected>"endereço atual" </option>
                        </select>

                        <!-- o usuario sera mandado para uma area onde poderar mudar e adicionar os endereços -->
                        <ul class="navbar-nav ms-auto">
                            <li class="nav-item "><a class="nav-link" href="arPerfil.php">gerenciar endereços</a></li>
                        </ul>
                    </div>

                    <!-- subtitulo de comunicação -->
                    <div class="col-md-6" style="color: var(--light-gray)">
                        <p>Comunicação</p>
                        <p>escolha como deseja receber nossas nividades e promoções.</p>
                    </div>

                    <!-- filto que o usuario poderar escolher as notificações -->
                    <div class="col-md-5">
                        <div class="filter-section">
                            <div class="form-check">
                                <input class="form-check-input" type="checkbox" id="cat1">
                                <label class="form-check-label text-light" for="cat1">receber novidades por e-mail</label>
                            </div>

                            <div class="form-check">
                                <input class="form-check-input" type="checkbox" id="cat4">
                                <label class="form-check-label text-light" for="cat4">receber promoções por e-email</label>
                            </div>
                            
                            <div class="form-check">
                                <input class="form-check-input" type="checkbox" id="cat2">
                                <label class="form-check-label text-light" for="cat2">notificação</label>
                            </div>
                        </div>
                    </div>

                    <p></p>

                    <!-- subtitulo de privacidade -->
                    <div class="col-md-4" style="color: var(--light-gray)">
                        <p>privacidade</p>
                        <p>gerencie suas preferências de privacidade.</p>
                    </div>

                    <div class="col-md-7" style="color: var(--light-gray)">
                        <p>perfil público</p>
                        <p>permitir que minha avaliação e comentários sejam vistos por outros clientes.</p>

                        <!-- botão de check, para caso o usuario quera que o feedback apareça para os outros usuario  -->
                            <div class="form-check form-switch">
                                <input class="form-check-input" type="checkbox" role="switch" id="switchCheckDefault">
                                <label class="form-check-label" for="switchCheckDefault"></label>
                            </div>
                    </div>

                    <!-- botão para salvar as preferencias -->
                    <div class="justify-content-Center row">
                            <div class="card-body text-center">
                                <a href="cadastro.php" class="btn btn-outline-warning btn-sm">salvar preferências</a>
                            </div>
                    </div>

                </div>
            </form>
        </div> 
    </div>
</div>

<!-- area do carrinho (offcanva) -->
<?php include "includes/offcar.php" ?>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>

</body>
</html>

<!-- adicionar o footer, a parte de baixo do site -->
<?php include "includes/footer.php"; ?>