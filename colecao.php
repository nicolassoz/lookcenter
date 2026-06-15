<?php 
// adicionar a parte de cima do site
include "includes/menu.php"
?>
<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>LookCenter | Catálogo de Roupas</title>
    <!-- Bootstrap 5 CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <!-- Google Fonts -->
    <link href="https://fonts.googleapis.com/css2?family=Playfair+Display:wght@700&family=Poppins:wght@300;400;600&display=swap" rel="stylesheet">
    <!-- CSS da Loja e CSS Específico do Catálogo -->
    <link rel="stylesheet" href="assets/css/style.css">
</head>
<body>

    <!-- Conteúdo Principal -->
    <div class="container my-5">
        
        <!-- BARRA SUPERIOR COM BOTÃO DE FILTRO E ORDENAÇÃO -->
        <div class="d-flex flex-wrap justify-content-between align-items-center mb-4 bg-dark p-3 rounded border border-secondary gap-3">
            <!-- BOTÃO QUE ABRE O FILTRO -->
            <button class="btn btn-gold d-flex align-items-center gap-2" type="button" data-bs-toggle="offcanvas" data-bs-target="#sidebarFiltros"> Filtrar Produtos </button>
 
            <div class="d-flex align-items-center gap-3 ml-auto">
                <p class="mb-0 text-secondary d-none d-sm-block"> Mostrando <span class="text-white fw-bold"> 6 </span> produtos</p>
                <div class="d-flex align-items-center gap-2">
                    <label for="sortSelect" class="text-secondary text-nowrap small mb-0"> Ordenar por: </label>
                    <select class="form-select form-select-sm bg-black text-light border-secondary" id="sortSelect">
                        <option>Mais recentes</option>
                        <option>Popular</option>
                        <option>Menor Preço</option>
                        <option>Maior Preço</option>
                    </select>
                </div>
            </div>
        </div>

        <?php include "includes/offcar.php" ?>
        
        <!-- ESTRUTURA DO FILTRO OCULTO (OFFCANVAS) -->
        <div class="offcanvas offcanvas-start bg-black text-white border-end border-secondary" tabindex="-1" id="sidebarFiltros" aria-labelledby="sidebarFiltrosLabel">
            <div class="offcanvas-header border-bottom border-secondary">
                <h5 class="offcanvas-title text-gold" id="sidebarFiltrosLabel">Filtrar Opções</h5>
                <button type="button" class="btn-close btn-close-white" data-bs-dismiss="offcanvas" aria-label="Close"></button>
            </div>
            <div class="offcanvas-body">
                <!-- Filtro por Categoria -->
                <div class="filter-section mb-4">
                    <h6 class="text-uppercase fw-bold text-light mb-3">Categoria</h6>
                    <div class="form-check mb-2">
                        <input class="form-check-input" type="checkbox" id="cat1">
                        <label class="form-check-label text-light" for="cat1">Camisas</label>
                    </div>

                    <div class="form-check mb-2">
                        <input class="form-check-input" type="checkbox" id="cat4">
                        <label class="form-check-label text-light" for="cat4">Moletons</label>
                    </div>
                    
                    <div class="form-check mb-2">
                        <input class="form-check-input" type="checkbox" id="cat2">
                        <label class="form-check-label text-light" for="cat2">Bermudas</label>
                    </div>
                    <div class="form-check mb-2">
                        <input class="form-check-input" type="checkbox" id="cat3">
                        <label class="form-check-label text-light" for="cat3">Calças</label>
                    </div>
                    
                </div>

                <!-- Filtro por Tamanho -->
                <div class="filter-section mb-4">
                    <h6 class="text-uppercase fw-bold text-light mb-3">Tamanho</h6>
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

                <!-- Filtro por Faixa de Preço -->
                <div class="filter-section mb-4">
                    <h6 class="text-uppercase fw-bold text-light mb-3">Preço Máximo</h6>
                    <input type="range" class="form-range custom-range" min="100" max="300" step="20" id="priceRange">
                    <div class="d-flex justify-content-between text-secondary small mt-1">
                        <span>R$ 100</span>
                        <span id="priceValue" class="text-warning fw-bold">R$ 200</span>
                        <span>R$ 300+</span>
                    </div>
                </div>

                <!-- Botão de Aplicar Filtro -->
                <button class="btn btn-gold w-100 mt-4" data-bs-dismiss="offcanvas">Aplicar Filtros</button>
            </div>
        </div>

        <!-- GRELHA DE PRODUTOS -->
        <main>
            <div class="row g-4">
                <!-- Produto 1 -->
                <div class="col-sm-6 col-md-4 col-lg-3">
                    <div class="card h-100">
                        <span class="badge position-absolute m-3 bg-gold text-dark">Premium</span>
                        <img src="https://images.unsplash.com/photo-1544441893-675973e31985?auto=format&fit=crop&w=500&q=60" class="card-img-top" alt="Blazer Gold">
                        <div class="card-body text-center">
                            <h5 class="card-title">Blazer Slim Noir</h5>
                            <p class="card-text text-secondary small">Lorem ipsum dolor sit amet.</p>
                            <p class="price">R$ 499,90</p>
                            <button class="btn btn-outline-warning btn-sm w-100">Ver Detalhes</button>
                        </div>
                    </div>
                </div>

                <!-- Produto 2 -->
                <div class="col-sm-6 col-md-4 col-lg-3">
                    <div class="card h-100">
                        <img src="https://images.unsplash.com/photo-1595777457583-95e059d581b8?auto=format&fit=crop&w=500&q=60" class="card-img-top" alt="Vestido">
                        <div class="card-body text-center">
                            <h5 class="card-title">Vestido Golden Hour</h5>
                            <p class="card-text text-secondary small">Lorem ipsum dolor sit amet.</p>
                            <p class="price">R$ 680,00</p>
                            <button class="btn btn-outline-warning btn-sm w-100">Ver Detalhes</button>
                        </div>
                    </div>
                </div>

                <!-- Produto 3 -->
                <div class="col-sm-6 col-md-4 col-lg-3">
                    <div class="card h-100">
                        <img src="https://images.unsplash.com/photo-1617137968427-85924c800a22?auto=format&fit=crop&w=500&q=60" class="card-img-top" alt="Terno">
                        <div class="card-body text-center">
                            <h5 class="card-title">Terno Completo Lux</h5>
                            <p class="card-text text-secondary small">Lorem ipsum dolor sit amet.</p>
                            <p class="price">R$ 899,00</p>
                            <button class="btn btn-outline-warning btn-sm w-100">Ver Detalhes</button>
                        </div>
                    </div>
                </div>

                <!-- Produto 4 -->
                <div class="col-sm-6 col-md-4 col-lg-3">
                    <div class="card h-100">
                        <img src="https://images.unsplash.com/photo-1507679799987-c73779587ccf?auto=format&fit=crop&w=500&q=60" class="card-img-top" alt="Camisa">
                        <div class="card-body text-center">
                            <h5 class="card-title">Camisa Executiva Satin</h5>
                            <p class="card-text text-secondary small">Lorem ipsum dolor sit amet.</p>
                            <p class="price">R$ 240,00</p>
                            <button class="btn btn-outline-warning btn-sm w-100">Ver Detalhes</button>
                        </div>
                    </div>
                </div>
            </div>
        </main>
    </div>

    <!-- Bootstrap 5 JS Bundle -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
    <script>
        // Script para atualizar dinamicamente o valor do preço na tela ao arrastar o filtro
        const range = document.getElementById('priceRange');
        const value = document.getElementById('priceValue');
        range.addEventListener('input', () => {
            value.textContent = `R$ ${range.value}`;
        });
    </script>
</body>
</html>

<?php 
// adicionar o footer, a parte de baixo do site
include "includes/footer.php"
?>