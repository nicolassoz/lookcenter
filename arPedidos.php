<!-- pagina da area de pedidos (o usuario podera ver as informações do perfil)-->

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
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/css/all.min.css">
    <link rel="stylesheet" href="style.css">

    <style>
        /* Painel Principal de Pedidos */
        .orders-panel {
            background-color: #111;
            border: 1px solid var(--primary-gold);
            border-radius: 10px;
            padding: 25px;
        }

        .orders-panel h2 {
            font-size: 1.4rem;
            font-weight: 600;
        }

        .orders-panel p {
            color: var(--light-gray);
            font-size: 0.9rem;
        }

        /* Itens da Lista de Pedidos */
        .order-item {
            border: 1px solid #ffd90050;
            border-radius: 8px;
            padding: 15px 20px;
            margin-bottom: 12px;
            transition: 0.2s;
        }

        .order-item:hover {
            border-color: #818181ff;
        }

        .order-info h6 {
            margin-bottom: 3px;
            font-size: 0.95rem;
            color: var(--light-gray);
        }

        .order-info span {
            font-size: 0.8rem;
            color: var(--light-gray);
        }

        .order-details-link {
            color: var(--accent-gold);
            text-decoration: none;
            font-size: 0.85rem;
            display: block;
            margin-top: 3px;
        }

        .order-details-link:hover {
            text-decoration: underline;
        }

        .order-price {
            font-weight: bold;
            font-size: 0.95rem;
            color: var(--light-gray);
        }

        .order-payment {
            font-size: 0.8rem;
            color: var(--light-gray);
        }

        /* Status Badges */
        .status-badge {
            font-size: 0.75rem;
            padding: 5px 12px;
            border-radius: 20px;
            font-weight: 500;
        }

        .status-entregue {
            background-color: rgba(25, 135, 84, 0.5);
            color: #ffffffff;
        }

        .status-andamento {
            background-color: rgba(13, 110, 253, 0.5);
            color: #ffffffff;
        }

        .status-novo {
            background-color: rgba(255, 217, 0, 0.66);
            color: #ffffffff;
        }

        .status-cancelado {
            background-color: rgba(247, 2, 2, 0.7);
            color: #ffffffff;
        }

        .arrow-icon {
            color: var(--primary-gold);
            font-size: 0.9rem;
        }

        /* Paginação */
        .pagination-btn {
            border: 1px solid var(--primary-gold);
            color: var(--accent-gold);
            background: transparent;
            font-size: 0.85rem;
            padding: 5px 15px;
            border-radius: 5px;
            text-decoration: none;
        }

        .pagination-btn:hover {
            background-color: var(--accent-gold);
            color: #000;
        }

        .page-number {
            color: var(--light-gray);
            text-decoration: none;
            margin: 0 8px;
            font-size: 0.9rem;
        }

        .page-number.active {
            background-color: var(--accent-gold);
            color: #000;
            padding: 3px 9px;
            border-radius: 4px;
            font-weight: bold;
        }

        .se {
            color: #ffca28;
        }
    </style>
</head>

<body>

    <div class="container mt-3">
        <div class="row">
            <!-- "navbar" que fica a esquerda pagina -->
            <div class="col-md-1">
                <ul class="navbar-nav ms-auto">
                    <li class="nav-item "><a class="nav-link" href="arPerfil.php">perfil</a></li>
                    <li class="nav-item "><a class="nav-link" href="arPedidos.php">pedidos</a></li>
                    <li class="nav-item "><a class="nav-link" href="arPreferencias.php">Preferências</a></li>
                </ul>
            </div>
            <!-- painel de pedidos do cliente onde o cliente pode ver todos os pedidos realizado -->
            <div class="col-lg-10 col-md-8">
                <div class="orders-panel">
                    <div style="color: var(--light-gray)">
                        <h5>Pedidos</h5>
                        <p>veja seus pedidos antigos e novos</p>
                    </div>
                    <!-- nav que deverar mostrar os pedidos selecionado (ex se o usuario aperta em entregue e para aparecer somente os pedidos que foram entregue) -->
                    <div class="row align-items-center mb-4 g-3">
                        <div class="col-lg-7 col-md-12">
                            <nav class="nav filter-tabs">
                                <a class="nav-link active" href="#">Todos</a>
                                <a class="nav-link" href="#">Novos</a>
                                <a class="nav-link" href="#">Em andamento</a>
                                <a class="nav-link" href="#">Entregues</a>
                                <a class="nav-link" href="#">Cancelados</a>
                            </nav>
                        </div>
                        <!-- campo de texto onde o usuario poderar buscar pelos pedidos-->
                        <div class="col-md-3">
                            <input type="text" class="form-control border border-1 border-warning" id="#" placeholder="buscar pedido..." style="background:transparent; color:white;">
                        </div>

                        <!-- o usuario poderar litrar os pedidos -->
                        <div class="col-md-1 dropdown">
                            <button class="btn dropdown-toggle" type="button" data-bs-toggle="dropdown" aria-expanded="false" style="color: var(--primary-gold);">filtrar</button>
                            <ul class="dropdown-menu">
                                <li><a class="dropdown-item" href="#">mais recente</a></li>
                                <li><a class="dropdown-item" href="#">mais antigo</a></li>
                                <li><a class="dropdown-item" href="#">em 3 meses</a></li>
                                <li><a class="dropdown-item" href="#">em 6 meses</a></li>
                                <li><a class="dropdown-item" href="#">em 1 ano</a></li>
                            </ul>
                        </div>
                    </div>
                    <!-- detalhes ds pedidos (e para aparecer os pedidos do usuario os esta abaixo é exemplo de como dever ser) -->
                    <div class="order-container mb-3">
                        <div class="order-item d-flex align-items-center justify-content-between"
                            data-bs-toggle="collapse"
                            data-bs-target="#detalhesPedido1"
                            role="button"
                            aria-expanded="false">
                            <div class="order-info">
                                <h6>Pedido #LC12345</h6>
                                <span>20/05/2024 às 14:32</span>
                            </div>
                            <div>
                                <span class="d-block" style="font-size: 0.9rem; color: var(--light-gray);">3 itens</span>
                                <span class="order-details-link">Ver detalhes</span>
                            </div>
                            <div>
                                <div class="order-price">R$ 459,90</div>
                                <div class="order-payment">Pix</div>
                            </div>
                            <div>
                                <span class="status-badge status-entregue">Entregue</span>
                            </div>
                            <div>
                                <span class="arrow-icon"><i class="fa-solid fa-chevron-down"></i></span>
                            </div>
                        </div>

                        <div class="collapse" id="detalhesPedido1">
                            <div class="p-3 mx-2 mb-2" style="background-color: #161616; border: 1px solid #222; border-top: none; border-radius: 0 0 8px 8px; font-size: 0.9rem;">
                                <h6 style="color: var(--accent-gold); font-size: 0.95rem;">Produtos deste pedido:</h6>
                                <ul class="list-unstyled mb-3" style="color: var(--light-gray);">
                                    <li><i class="fa-solid fa-circle font-xs me-2" style="font-size: 6px; vertical-align: middle;"></i> 1x Camiseta Over Void Preta - G (R$ 159,90)</li>
                                    <li><i class="fa-solid fa-circle font-xs me-2" style="font-size: 6px; vertical-align: middle;"></i> 1x Calça Cargo Street Preta - 42 (R$ 220,00)</li>
                                    <li><i class="fa-solid fa-circle font-xs me-2" style="font-size: 6px; vertical-align: middle;"></i> 1x Boné Strapback Classic - Único (R$ 80,00)</li>
                                </ul>
                                <div class="row pt-2" style="border-top: 1px solid #222;">
                                    <div class="col-md-6">
                                        <span class="d-block se">Endereço de Entrega:</span>
                                        <span style="color: white;">Rua das Flores, 123 - Centro, São Paulo - SP</span>
                                    </div>
                                    <div class="col-md-6 text-md-end mt-2 mt-md-0">
                                        <span class="d-block" style="color: white;">Código de Rastreio:</span>
                                        <a href="#" style="color: var(--accent-gold); text-decoration: none;"><i class="fa-solid fa-truck me-1"></i> BR123456789BR</a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="order-container mb-3">
                        <div class="order-item d-flex align-items-center justify-content-between"
                            data-bs-toggle="collapse"
                            data-bs-target="#detalhesPedido2"
                            role="button"
                            aria-expanded="false">
                            <div class="order-info">
                                <h6>Pedido #LC12344</h6>
                                <span>18/05/2024 às 10:15</span>
                            </div>
                            <div>
                                <span class="d-block" style="font-size: 0.9rem; color:var(--light-gray);">2 itens</span>
                                <span class="order-details-link">Ver detalhes</span>
                            </div>
                            <div>
                                <div class="order-price">R$ 239,80</div>
                                <div class="order-payment">Cartão de crédito</div>
                            </div>
                            <div>
                                <span class="status-badge status-andamento">Em andamento</span>
                            </div>
                            <div>
                                <span class="arrow-icon"><i class="fa-solid fa-chevron-down"></i></span>
                            </div>
                        </div>

                        <div class="collapse" id="detalhesPedido2">
                            <div class="p-3 mx-2 mb-2" style="background-color: #161616; border: 1px solid #222; border-top: none; border-radius: 0 0 8px 8px; font-size: 0.9rem;">
                                <h6 style="color: var(--accent-gold); font-size: 0.95rem;">Produtos deste pedido:</h6>
                                <ul class="list-unstyled mb-3" style="color: var(--light-gray);">
                                    <li><i class="fa-solid fa-circle font-xs me-2" style="font-size: 6px; vertical-align: middle;"></i> 2x Camiseta Basic LookCenter - M (R$ 119,90 cada)</li>
                                </ul>
                                <div class="row pt-2" style="border-top: 1px solid #222;">
                                    <div class="col-md-6">
                                        <span class="d-block se">Status do Envio:</span>
                                        <span class="text-info"><i class="fa-solid fa-box-open me-1"></i> O vendedor está preparando o seu pacote.</span>
                                    </div>
                                </div>
                            </div>
                        </div>


                        <div class="order-container mb-3">
                            <div class="order-item d-flex align-items-center justify-content-between"
                                data-bs-toggle="collapse"
                                data-bs-target="#detalhesPedido3"
                                role="button"
                                aria-expanded="false">
                                <div class="order-info">
                                    <h6>Pedido #LC12344</h6>
                                    <span>18/05/2024 às 10:15</span>
                                </div>
                                <div>
                                    <span class="d-block" style="font-size: 0.9rem; color:var(--light-gray);">2 itens</span>
                                    <span class="order-details-link">Ver detalhes</span>
                                </div>
                                <div>
                                    <div class="order-price">R$ 239,80</div>
                                    <div class="order-payment">Cartão de crédito</div>
                                </div>
                                <div>
                                    <span class="status-badge status-cancelado">Cancelado</span>
                                </div>
                                <div>
                                    <span class="arrow-icon"><i class="fa-solid fa-chevron-down"></i></span>
                                </div>
                            </div>

                            <div class="collapse" id="detalhesPedido3">
                                <div class="p-3 mx-2 mb-2" style="background-color: #161616; border: 1px solid #222; border-top: none; border-radius: 0 0 8px 8px; font-size: 0.9rem;">
                                    <h6 style="color: var(--accent-gold); font-size: 0.95rem;">Produtos deste pedido:</h6>
                                    <ul class="list-unstyled mb-3" style="color: var(--light-gray);">
                                        <li><i class="fa-solid fa-circle font-xs me-2" style="font-size: 6px; vertical-align: middle;"></i> 2x Camiseta Basic LookCenter - M (R$ 119,90 cada)</li>
                                    </ul>
                                    <div class="row pt-2" style="border-top: 1px solid #222;">
                                        <div class="col-md-6">
                                            <span class="d-block se">Status do Envio:</span>
                                            <span class="text-info"><i class="fa-solid fa-box-open me-1"></i> O vendedor está preparando o seu pacote.</span>
                                        </div>
                                    </div>
                                </div>
                            </div>


                            <div class="order-container mb-3">
                                <div class="order-item d-flex align-items-center justify-content-between"
                                    data-bs-toggle="collapse"
                                    data-bs-target="#detalhesPedido4"
                                    role="button"
                                    aria-expanded="false">
                                    <div class="order-info">
                                        <h6>Pedido #LC12344</h6>
                                        <span>18/05/2024 às 10:15</span>
                                    </div>
                                    <div>
                                        <span class="d-block" style="font-size: 0.9rem; color:var(--light-gray);">2 itens</span>
                                        <span class="order-details-link">Ver detalhes</span>
                                    </div>
                                    <div>
                                        <div class="order-price">R$ 239,80</div>
                                        <div class="order-payment">Cartão de crédito</div>
                                    </div>
                                    <div>
                                        <span class="status-badge status-novo">Novo</span>
                                    </div>
                                    <div>
                                        <span class="arrow-icon"><i class="fa-solid fa-chevron-down"></i></span>
                                    </div>
                                </div>

                                <div class="collapse" id="detalhesPedido4">
                                    <div class="p-3 mx-2 mb-2" style="background-color: #161616; border: 1px solid #222; border-top: none; border-radius: 0 0 8px 8px; font-size: 0.9rem;">
                                        <h6 style="color: var(--accent-gold); font-size: 0.95rem;">Produtos deste pedido:</h6>
                                        <ul class="list-unstyled mb-3" style="color: var(--light-gray);">
                                            <li><i class="fa-solid fa-circle font-xs me-2" style="font-size: 6px; vertical-align: middle;"></i> 2x Camiseta Basic LookCenter - M (R$ 119,90 cada)</li>
                                        </ul>
                                        <div class="row pt-2" style="border-top: 1px solid #222;">
                                            <div class="col-md-6">
                                                <span class="d-block se">Status do Envio:</span>
                                                <span class="text-info"><i class="fa-solid fa-box-open me-1"></i> O vendedor está preparando o seu pacote.</span>
                                            </div>
                                        </div>
                                    </div>
                                </div>

                            </div>
                            <!-- para mudar de pagina -->
                            <div class="d-flex justify-content-between align-items-center mt-4">
                                <a href="#" class="pagination-btn"><i class="fa-solid fa-chevron-left me-1"></i> Anterior</a>
                                <div class="d-flex align-items-center">
                                    <a href="#" class="page-number active">1</a>
                                    <a href="#" class="page-number">2</a>
                                    <a href="#" class="page-number">3</a>
                                    <a href="#" class="page-number">4</a>
                                </div>
                                <a href="#" class="pagination-btn">Próximo <i class="fa-solid fa-chevron-right ms-1"></i></a>
                            </div>

                        </div>
                    </div>
                </div>
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