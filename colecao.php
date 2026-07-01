
<!-- pagina de roupas -->

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
    <link rel="stylesheet" href="style.css">
</head>
<body>

    <!-- Conteúdo Principal -->
    <div class="container my-5">
        
        <!-- BARRA SUPERIOR COM BOTÃO DE FILTRO E ORDENAÇÃO -->
        <div class="d-flex flex-wrap justify-content-between align-items-center mb-4 bg-dark p-3 rounded border border-secondary gap-3">
            <!-- BOTÃO QUE ABRE O FILTRO DE ORDEM -->
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

        <!-- area do carrinho (offcanva) -->
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
                        <img src="roupas/camisas/camisa_neymar_jr_streetwear_preta_frente.png" class="card-img-top" alt="Blazer Gold">
                        <div class="card-body text-center">
                            <h5 class="card-title">Camisa Neymar Jr.</h5>
                            <p class="price">R$ 159,99</p>
                            <a class="btn btn-outline-warning btn-sm w-100" href="paginaRoupas/pg_camisas/pg_camisa_NJR.php">Ver Detalhes</a>
                        </div>
                    </div>
                </div>

                <!-- Produto 2 -->
                <div class="col-sm-6 col-md-4 col-lg-3">
                    <div class="card h-100">
                        <img src="roupas/camisas/Camisa_Jersey_Blunt_Querubins_frente.jpg" class="card-img-top" alt="Camisa">
                        <div class="card-body text-center">
                            <h5 class="card-title">Camisa polo jersey</h5>
                            <p class="price">R$179,90</p>
                            <a class="btn btn-outline-warning btn-sm w-100" href="paginaRoupas/pg_camisas/pg_camisa_J_P_Q.php">Ver Detalhes</a>
                        </div>
                    </div>
                </div>

                <!-- Produto 3 -->
                <div class="col-sm-6 col-md-4 col-lg-3">
                    <div class="card h-100">
                        <img src="roupas/camisas/Camisa_Jersey_Dragão_frente.jpg" class="card-img-top" alt="Camisa">
                        <div class="card-body text-center">
                            <h5 class="card-title">Camisa polo jersey Dragon</h5>
                            <p class="price">R$ 159,90</p>
                            <a class="btn btn-outline-warning btn-sm w-100" href="paginaRoupas/pg_camisas/pg_camisa_J_D.php">Ver Detalhes</a>
                        </div>
                    </div>
                </div>

                <!-- Produto 4 -->
                <div class="col-sm-6 col-md-4 col-lg-3">
                    <div class="card h-100">
                        <img src="roupas/camisas/Camisa_Polo_Tripside_Tribal_frente.jpg" class="card-img-top" alt="Camisa">
                        <div class="card-body text-center">
                            <h5 class="card-title">Camisa Polo Tribal 1977</h5>
                            <p class="price">R$ 189,90</p>
                            <a class="btn btn-outline-warning btn-sm w-100" href="paginaRoupas/pg_camisas/pg_camisa_p_t_t.php">Ver Detalhes</a>
                        </div>
                    </div>
                </div>

                <!-- Produto 5 -->
                <div class="col-sm-6 col-md-4 col-lg-3">
                    <div class="card h-100">
                        <img src="roupas/camisas/Camiseta_Basic_Tag_Marrom_frente.jpg" class="card-img-top" alt="Camisa">
                        <div class="card-body text-center">
                            <h5 class="card-title">Camisa Graffit</h5>
                            <p class="price">R$ 149,90</p>
                            <a class="btn btn-outline-warning btn-sm w-100" href="paginaRoupas/pg_camisas/pg_camiseta_b_t_marrom.php">Ver Detalhes</a>
                        </div>
                    </div>
                </div>

                <!-- Produto 6 -->
                <div class="col-sm-6 col-md-4 col-lg-3">
                    <div class="card h-100">
                        <img src="roupas/camisas/Camiseta_Compton_Cruz_frente.jpg" class="card-img-top" alt="Camisa">
                        <div class="card-body text-center">
                            <h5 class="card-title">Camisa Compton</h5>
                            <p class="price">R$ 129,90</p>
                            <a class="btn btn-outline-warning btn-sm w-100" href="paginaRoupas/pg_camisas/pg_camiseta_c_c.php">Ver Detalhes</a>
                        </div>
                    </div>
                </div>

                <!-- Produto 7 -->
                <div class="col-sm-6 col-md-4 col-lg-3">
                    <div class="card h-100">
                        <img src="roupas/camisas/Camiseta_Cyber_Essence_Neo-code_frente.jpg" class="card-img-top" alt="Camisa">
                        <div class="card-body text-center">
                            <h5 class="card-title">Camisa Dragon Cyber</h5>
                            <p class="price">R$ 129,30</p>
                            <a class="btn btn-outline-warning btn-sm w-100" href="paginaRoupas/pg_camisas/pg_camiseta_C_E_Nc.php">Ver Detalhes</a>
                        </div>
                    </div>
                </div>

                <!-- Produto 8 -->
                <div class="col-sm-6 col-md-4 col-lg-3">
                    <div class="card h-100">
                        <img src="roupas/camisas/Camiseta_Máscara_Tática_frente.jpg" class="card-img-top" alt="Camisa">
                        <div class="card-body text-center">
                            <h5 class="card-title">Camisa Skull</h5>
                            <p class="price">R$ 159,90</p>
                            <a class="btn btn-outline-warning btn-sm w-100" href="paginaRoupas/pg_camisas/pg_camiseta_M_T.php">Ver Detalhes</a>
                        </div>
                    </div>
                </div>

                <!-- Produto 9 -->
                <div class="col-sm-6 col-md-4 col-lg-3">
                    <div class="card h-100">
                        <img src="roupas/camisas/Camiseta_Oval_angel_frente.jpg" class="card-img-top" alt="Camisa">
                        <div class="card-body text-center">
                            <h5 class="card-title">Camisa angel black</h5>
                            <p class="price">R$ 240,00</p>
                            <a class="btn btn-outline-warning btn-sm w-100" href="paginaRoupas/pg_camisas/pg_camiseta_O_A.php">Ver Detalhes</a>
                        </div>
                    </div>
                </div>

                <!-- Produto 10 -->
                <div class="col-sm-6 col-md-4 col-lg-3">
                    <div class="card h-100">
                        <img src="roupas/camisas/Camiseta_Tag_Central_frente.jpg" class="card-img-top" alt="Camisa">
                        <div class="card-body text-center">
                            <h5 class="card-title">Camisa Graffit black</h5>
                            <p class="price">R$ 189,90</p>
                            <button class="btn btn-outline-warning btn-sm w-100">Ver Detalhes</button>
                        </div>
                    </div>
                </div>

                <!-- Produto 11 -->
                <div class="col-sm-6 col-md-4 col-lg-3">
                    <div class="card h-100">
                        <img src="roupas/camisas/Camiseta_Topside_black_frente.jpg" class="card-img-top" alt="Camisa">
                        <div class="card-body text-center">
                            <h5 class="card-title">Camisa Compton Black</h5>
                            <p class="price">R$ 139,90</p>
                            <a class="btn btn-outline-warning btn-sm w-100" href="paginaRoupas/pg_camisas/pg_camiseta_T_Black.php">Ver Detalhes</a>
                        </div>
                    </div>
                </div>     


                <!-- bermudas -->


                <!-- Produto 12 -->
                <div class="col-sm-6 col-md-4 col-lg-3">
                    <div class="card h-100">
                        <img src="roupas/bermudas/Bermuda_Cargo_Techwear_Preta_frente.jpg" class="card-img-top" alt="Camisa">
                        <div class="card-body text-center">
                            <h5 class="card-title">Bermuda Streetwear Preta Apparel</h5>
                            <p class="price">R$ 119,90</p>
                            <button class="btn btn-outline-warning btn-sm w-100">Ver Detalhes</button>
                        </div>
                    </div>
                </div>

                <!-- Produto 13 -->
                <div class="col-sm-6 col-md-4 col-lg-3">
                    <div class="card h-100">
                        <img src="roupas/bermudas/Bermuda_Jeans_Carpenter_Cinza_frente.jpg" class="card-img-top" alt="Camisa">
                        <div class="card-body text-center">
                            <h5 class="card-title">Bermuda Tribal Topside</h5>
                            <p class="price">R$ 130,20</p>
                            <button class="btn btn-outline-warning btn-sm w-100">Ver Detalhes</button>
                        </div>
                    </div>
                </div>

                <!-- Produto 14 -->
                <div class="col-sm-6 col-md-4 col-lg-3">
                    <div class="card h-100">
                        <img src="roupas/bermudas/Bermuda_Streetwear_Preta_Apparel_frente.jpg" class="card-img-top" alt="Camisa">
                        <div class="card-body text-center">
                            <h5 class="card-title">Bermuda Cargo Cyber Black</h5>
                            <p class="price">R$ 110,00</p>
                            <button class="btn btn-outline-warning btn-sm w-100">Ver Detalhes</button>
                        </div>
                    </div>
                </div>
                
                <!-- Produto 15 -->
                <div class="col-sm-6 col-md-4 col-lg-3">
                    <div class="card h-100">
                        <img src="roupas/bermudas/Bermuda_TribalTopside_frente.jpg" class="card-img-top" alt="Camisa">
                        <div class="card-body text-center">
                            <h5 class="card-title">bermuda oversized tribal</h5>
                            <p class="price">R$ 125,30</p>
                            <button class="btn btn-outline-warning btn-sm w-100">Ver Detalhes</button>
                        </div>
                    </div>
                </div>

                <!-- Produto 16 -->
                <div class="col-sm-6 col-md-4 col-lg-3">
                    <div class="card h-100">
                        <img src="roupas/bermudas/Bermuda_Graffit_Thunder.jpg" class="card-img-top" alt="Camisa">
                        <div class="card-body text-center">
                            <h5 class="card-title">Bermuda Graffit Thuder</h5>
                            <p class="price">R$ 120,00</p>
                            <button class="btn btn-outline-warning btn-sm w-100">Ver Detalhes</button>
                        </div>
                    </div>
                </div>

                <!-- Produto 17 -->
                <div class="col-sm-6 col-md-4 col-lg-3">
                    <div class="card h-100">
                        <img src="roupas/bermudas/Bermuda_Jeans_Topside_cruz.jpg" class="card-img-top" alt="Camisa">
                        <div class="card-body text-center">
                            <h5 class="card-title">Bermuda jeans topside cruz</h5>
                            <p class="price">R$ 190,00</p>
                            <button class="btn btn-outline-warning btn-sm w-100">Ver Detalhes</button>
                        </div>
                    </div>
                </div>

                <!-- Produto 18 -->
                <div class="col-sm-6 col-md-4 col-lg-3">
                    <div class="card h-100">
                        <img src="roupas/bermudas/Bermuda_Jeans_Gray.jpg" class="card-img-top" alt="Camisa">
                        <div class="card-body text-center">
                            <h5 class="card-title">Bermuda jeans Gray</h5>
                            <p class="price">R$ 140,00</p>
                            <button class="btn btn-outline-warning btn-sm w-100">Ver Detalhes</button>
                        </div>
                    </div>
                </div>


                <!-- calças -->


                <!-- Produto 19 -->
                <div class="col-sm-6 col-md-4 col-lg-3">
                    <div class="card h-100">
                        <img src="roupas/calcas/Calça_Cargo_Jeans_Off-White_frente.jpg" class="card-img-top" alt="Camisa">
                        <div class="card-body text-center">
                            <h5 class="card-title">Calça Jeans Baggy Clássica</h5>
                            <p class="price">R$ 220,30</p>
                            <button class="btn btn-outline-warning btn-sm w-100">Ver Detalhes</button>
                        </div>
                    </div>
                </div>

                <!-- Produto 20 -->
                <div class="col-sm-6 col-md-4 col-lg-3">
                    <div class="card h-100">
                        <img src="roupas/calcas/Calça_Jeans_Baggy_Black_Acid_frente.jpg" class="card-img-top" alt="Camisa">
                        <div class="card-body text-center">
                            <h5 class="card-title">Calça Jeans Black Topside</h5>
                            <p class="price">R$ 215,64</p>
                            <button class="btn btn-outline-warning btn-sm w-100">Ver Detalhes</button>
                        </div>
                    </div>
                </div>

                <!-- Produto 21 -->
                <div class="col-sm-6 col-md-4 col-lg-3">
                    <div class="card h-100">
                        <img src="roupas/calcas/Calça_Jeans_Baggy_Clássica_frente.jpg" class="card-img-top" alt="Camisa">
                        <div class="card-body text-center">
                            <h5 class="card-title">Calça Jeans Carpenter Light Blue</h5>
                            <p class="price">R$ 230,98</p>
                            <button class="btn btn-outline-warning btn-sm w-100">Ver Detalhes</button>
                        </div>
                    </div>
                </div>

                <!-- Produto 22 -->
                <div class="col-sm-6 col-md-4 col-lg-3">
                    <div class="card h-100">
                        <img src="roupas/calcas/Calça_Jeans_Black_Topside_frente.jpg" class="card-img-top" alt="Camisa">
                        <div class="card-body text-center">
                            <h5 class="card-title">Camisa Executiva Satin</h5>
                            <p class="price">R$ 240,00</p>
                            <button class="btn btn-outline-warning btn-sm w-100">Ver Detalhes</button>
                        </div>
                    </div>
                </div>

                <!-- Produto 23 -->
                <div class="col-sm-6 col-md-4 col-lg-3">
                    <div class="card h-100">
                        <img src="roupas/calcas/Calça_Jeans_Carpenter_Light_Blue_frente.jpg" class="card-img-top" alt="Camisa">
                        <div class="card-body text-center">
                            <h5 class="card-title">Calça Jeans Vintage</h5>
                            <p class="price">R$ 229.90</p>
                            <button class="btn btn-outline-warning btn-sm w-100">Ver Detalhes</button>
                        </div>
                    </div>
                </div>

                <!-- Produto 24 -->
                <div class="col-sm-6 col-md-4 col-lg-3">
                    <div class="card h-100">
                        <img src="roupas/calcas/Calça_Jeans_Tribal_Blue.jpg" class="card-img-top" alt="Camisa">
                        <div class="card-body text-center">
                            <h5 class="card-title">Calça Jeans Tribal</h5>
                            <p class="price">R$ 189,90</p>
                            <button class="btn btn-outline-warning btn-sm w-100">Ver Detalhes</button>
                        </div>
                    </div>
                </div>

                <!-- Produto 25 -->
                <div class="col-sm-6 col-md-4 col-lg-3">
                    <div class="card h-100">
                        <img src="roupas/calcas/Calça_Jeans_Spider.jpg" class="card-img-top" alt="Camisa">
                        <div class="card-body text-center">
                            <h5 class="card-title">Calça Jeans Spider</h5>
                            <p class="price">R$ 159,00</p>
                            <button class="btn btn-outline-warning btn-sm w-100">Ver Detalhes</button>
                        </div>
                    </div>
                </div>

                <!-- Produto 26 -->
                <div class="col-sm-6 col-md-4 col-lg-3">
                    <div class="card h-100">
                        <img src="roupas/calcas/Calça Jeans Light Blue.jpg" class="card-img-top" alt="Camisa">
                        <div class="card-body text-center">
                            <h5 class="card-title">Calça Jeans Light Blue</h5>
                            <p class="price">R$ 155,00</p>
                            <button class="btn btn-outline-warning btn-sm w-100">Ver Detalhes</button>
                        </div>
                    </div>
                </div>

                <!-- Produto 27 -->
                <div class="col-sm-6 col-md-4 col-lg-3">
                    <div class="card h-100">
                        <img src="roupas/calcas/Calça Jeans Branca.jpg" class="card-img-top" alt="Camisa">
                        <div class="card-body text-center">
                            <h5 class="card-title">Calça Jeans branca</h5>
                            <p class="price">R$ 155,00</p>
                            <button class="btn btn-outline-warning btn-sm w-100">Ver Detalhes</button>
                        </div>
                    </div>
                </div>

                <!-- Produto 28 -->
                <div class="col-sm-6 col-md-4 col-lg-3">
                    <div class="card h-100">
                        <img src="roupas/calcas/Calça_Jeans_Baggy_Classic.jpg" class="card-img-top" alt="Camisa">
                        <div class="card-body text-center">
                            <h5 class="card-title">Calça Jeans Baggy Classic</h5>
                            <p class="price">R$ 190,00</p>
                            <button class="btn btn-outline-warning btn-sm w-100">Ver Detalhes</button>
                        </div>
                    </div>
                </div>

                <!-- Produto 29 -->
                <div class="col-sm-6 col-md-4 col-lg-3">
                    <div class="card h-100">
                        <img src="roupas/calcas/Calça_jeans_Classica_Azul.jpg" class="card-img-top" alt="Camisa">
                        <div class="card-body text-center">
                            <h5 class="card-title">Calça Jeans Clasica azul</h5>
                            <p class="price">R$ 155,00</p>
                            <button class="btn btn-outline-warning btn-sm w-100">Ver Detalhes</button>
                        </div>
                    </div>
                </div>


                <!-- moletons -->


                <!-- Produto 30 -->
                <div class="col-sm-6 col-md-4 col-lg-3">
                    <div class="card h-100">
                        <img src="roupas/moletons/Moletom_bear_black_frente.jpg" class="card-img-top" alt="Camisa">
                        <div class="card-body text-center">
                            <h5 class="card-title">Moletom Patch Bear black</h5>
                            <p class="price">R$ 229,00</p>
                            <button class="btn btn-outline-warning btn-sm w-100">Ver Detalhes</button>
                        </div>
                    </div>
                </div>

                <!-- Produto 31 -->
                <div class="col-sm-6 col-md-4 col-lg-3">
                    <div class="card h-100">
                        <img src="roupas/moletons/Moletom_cruz_frente.jpg" class="card-img-top" alt="Camisa">
                        <div class="card-body text-center">
                            <h5 class="card-title">Moletom TPSD</h5>
                            <p class="price">R$ 189,90</p>
                            <button class="btn btn-outline-warning btn-sm w-100">Ver Detalhes</button>
                        </div>
                    </div>
                </div>

                <!-- Produto 32 -->
                <div class="col-sm-6 col-md-4 col-lg-3">
                    <div class="card h-100">
                        <img src="roupas/moletons/Moletom_Red_Graphics_frente.jpg" class="card-img-top" alt="Camisa">
                        <div class="card-body text-center">
                            <h5 class="card-title">Moletom White Skull</h5>
                            <p class="price">R$ 209,00</p>
                            <button class="btn btn-outline-warning btn-sm w-100">Ver Detalhes</button>
                        </div>
                    </div>
                </div>
                <!-- Produto 33 -->
                <div class="col-sm-6 col-md-4 col-lg-3">
                    <div class="card h-100">
                        <img src="roupas/moletons/Moleton_Bear_Red_frente.jpg" class="card-img-top" alt="Camisa">
                        <div class="card-body text-center">
                            <h5 class="card-title">Moletom Patch Bear Red</h5>
                            <p class="price">R$ 199,67</p>
                            <button class="btn btn-outline-warning btn-sm w-100">Ver Detalhes</button>
                        </div>
                    </div>
                </div>

                <!-- Produto 34 -->
                <div class="col-sm-6 col-md-4 col-lg-3">
                    <div class="card h-100">
                        <img src="roupas/moletons/Moletom_Graffit_urbano.jpg" class="card-img-top" alt="Camisa">
                        <div class="card-body text-center">
                            <h5 class="card-title">Moletom Graffit Urbano</h5>
                            <p class="price">R$ 250,00</p>
                            <button class="btn btn-outline-warning btn-sm w-100">Ver Detalhes</button>
                        </div>
                    </div>
                </div>

                <!-- Produto 35 -->
                <div class="col-sm-6 col-md-4 col-lg-3">
                    <div class="card h-100">
                        <img src="roupas/moletons/Moletom_TPSD_black.jpg" class="card-img-top" alt="Camisa">
                        <div class="card-body text-center">
                            <h5 class="card-title">Moletom TPSD black</h5>
                            <p class="price">R$ 240,00</p>
                            <button class="btn btn-outline-warning btn-sm w-100">Ver Detalhes</button>
                        </div>
                    </div>
                </div>

                <!-- Produto 36 -->
                <div class="col-sm-6 col-md-4 col-lg-3">
                    <div class="card h-100">
                        <img src="roupas/moletons/Moletom_TPSD_Red_AND_White.jpg" class="card-img-top" alt="Camisa">
                        <div class="card-body text-center">
                            <h5 class="card-title">Moletom TPSD Red and Black</h5>
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