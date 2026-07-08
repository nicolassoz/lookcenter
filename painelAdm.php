
<!-- pagina da area do adm (so o adm pode acessar esta area)-->

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
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.13.1/font/bootstrap-icons.min.css">
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
<!-- titulo -->
<div class="container mt-3">
    <div class="row">
        <div class="col-md-11">
            <h2  style="color: var(--primary-gold)">Olá Administrador!</h2>
            <p class="footer-text">Bem vindo ao painel da loja.</p>
        </div>
        
            <!-- o usuario poderar as informações da loja -->
        <div class="col-md-1">
            <button class="btn dropdown-toggle" type="button" data-bs-toggle="dropdown" aria-expanded="false" style="color: var(--primary-gold);">filtrar</button>
            <ul class="dropdown-menu bg-black text-light">
                <li><a class="dropdown-item text-light" href="#">ultimas 24H</a></li>
                <li><a class="dropdown-item text-light" href="#">ultima semana</a></li>
                <li><a class="dropdown-item text-light" href="#">ultimo mes</a></li>
                <li><a class="dropdown-item text-light" href="#">ultimos 3 meses</a></li>
                <li><a class="dropdown-item text-light" href="#">ultimos 6 meses</a></li>
                <li><a class="dropdown-item text-light" href="#">ultimo 1 ano</a></li>
                <li><a class="dropdown-item text-light" href="#">ultimo 2 ano</a></li>
                <li><a class="dropdown-item text-light" href="#">sempre</a></li>
            </ul>
        </div>
    </div>
        <!-- informações da loja -->
    <div class="row">
        <div class="col col-md-3 text-center" >
            <form class="card" style="color: var(--light-gray);">
                <div>
                    <p>vendas (hoje)</p>
                    <h3><i class="bi bi-currency-dollar" style="font-size: 2rem; color:#ffca28;"> </i>R$1.000,00</h3>
                    <span>2.0% vs ontem</span>
                </div>
            </form>
        </div>

        <div class="col col-md-3 text-center" >
            <form class="card" style="color: var(--light-gray);">
                <div>
                    <p>pedidos (hoje)</p>
                    <h3><i class="bi bi-bag" style="font-size: 2rem; color:#ffca28;"> </i>5</h3>
                    <span>3.2% vs ontem</span>
                </div>
            </form>
        </div>
        <!-- total de cliente -->
        <div class="col col-md-3 text-center" >
            <form class="card" style="color: var(--light-gray);">
                <div>
                    <p>clientes</p>
                    <h3><i class="bi bi-people" style="font-size: 2rem; color:#ffca28;"> </i>2.728</h3>
                    <span>7.7% este més</span>
                </div>
            </form>
        </div>
        <!-- total de produtos em estoque -->
        <div class="col col-md-3 text-center" >
            <form class="card" style="color: var(--light-gray);">
                <div>
                    <p>produtos</p>
                    <h3><i class="bi bi-box-seam" style="font-size: 2rem; color:#ffca28;"> </i>200</h3>
                    <span>total em estoque</span>
                </div>
            </form>
        </div>
    </div>

    <div class="col">
        
            <!-- exemplo de pedidos -->
            <div class="col-lg-12 col-md-8">
                <div class="orders-panel">

                     <div class="row">
                        <h5 class="col-md-10 m-2" style="color: var(--light-gray);">pedidos recentes</h5>
                        <ul class="navbar-nav ms-auto col-md-1">
                            <li class="nav-item"><a class="nav-link" href="#">ver todos</a></li>
                        </ul> 
                    </div>
                    
                    <div class="d-flex lign-items-center justify-content-between m-3">
                        <h5 style="color: var(--light-gray);">pedido</h5>
                        <h5 style="color: var(--light-gray);">cliente</h5>
                        <h5 style="color: var(--light-gray);">data</h5>
                        <h5 style="color: var(--light-gray);">status</h5>
                        <h5 style="color: var(--light-gray);">valor</h5>
                        <h5 style="color: var(--light-gray);">ação</h5>
                    </div>  

                    <!-- detalhes ds pedidos (e para aparecer os pedidos dos usuario os esta abaixo é exemplo de como dever ser) -->
                    <div class="order-container mb-3">
                        <div class="order-item d-flex align-items-center justify-content-between"
                            data-bs-toggle="collapse"
                            data-bs-target="#detalhesPedido1"
                            role="button"
                            aria-expanded="false">
                            <!-- id do pedido -->
                            <div class="order-info">
                                <h6>#LC12345</h6>
                            </div>
                            <!-- nome do cliente -->
                            <div class="order-info">
                                <h6>Carlos Henrique</h6>
                            </div>
                            <!-- data e hora -->
                            <div>
                                <span class="d-block" style="font-size: 0.9rem; color: var(--light-gray);">20/05/2024 às 14:32</span>
                                
                            </div>
                            <!-- status do pedido -->
                            <div>
                                <span class="status-badge status-entregue">Entregue</span>
                            </div>
                            <!-- valor do pedido -->
                            <div>
                                <div class="order-price">R$ 459,90</div>
                            </div>

                            <div>
                                <span class="arrow-icon"><i class="fa-solid fa-chevron-down"></i></span>
                            </div>
                        </div>
                        <!-- aparecer as peças que foi compradas -->
                        <div class="collapse" id="detalhesPedido1">
                            <div class="p-3 mx-2 mb-2" style="background-color: #161616; border: 1px solid #222; border-top: none; border-radius: 0 0 8px 8px; font-size: 0.9rem;">
                                <h6 style="color: var(--accent-gold); font-size: 0.95rem;">Produtos deste pedido:</h6>
                                <ul class="list-unstyled mb-3" style="color: var(--light-gray);">
                                    <li><i class="fa-solid fa-circle font-xs me-2" style="font-size: 6px; vertical-align: middle;"></i> 1x Camiseta Over Void Preta - G (R$ 159,90)</li>
                                    <li><i class="fa-solid fa-circle font-xs me-2" style="font-size: 6px; vertical-align: middle;"></i> 1x Calça Cargo Street Preta - 42 (R$ 220,00)</li>
                                    <li><i class="fa-solid fa-circle font-xs me-2" style="font-size: 6px; vertical-align: middle;"></i> 1x Boné Strapback Classic - Único (R$ 80,00)</li>
                                </ul>
                                <!-- mandar para outra pagina que mostara mas detalhes -->
                                <div class="row pt-2" style="border-top: 1px solid #222;">
                                    <div class="col-md-12 text-center">
                                        <button class="btn btn-outline-warning btn-sm">ver detalhes</button>
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
                                <h6>#LC12344</h6>
                                
                            </div>
                            <div class="order-info">
                                <h6>Rafael Souza</h6>
                            </div>
                            <div>
                                <span class="d-block" style="font-size: 0.9rem; color:var(--light-gray);">18/05/2024 às 10:15</span>
                                
                            </div>

                            <div>
                                <span class="status-badge status-andamento">Em andamento</span>
                            </div>

                            <div>
                                <div class="order-price">R$ 239,80</div>
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
                                    <div class="col-md-12 text-center">
                                        <button class="btn btn-outline-warning btn-sm">ver detalhes</button>
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
                                    <h6>#LC12344</h6>
                                    
                                </div>
                                <div class="order-info">
                                <h6>Lucas Martins</h6>
                                </div>
                                <div>
                                    <span class="d-block" style="font-size: 0.9rem; color:var(--light-gray);">18/05/2024 às 10:15</span>
                                    
                                </div>
                                
                                <div>
                                    <span class="status-badge status-cancelado">Cancelado</span>
                                </div>
                                <div>
                                    <div class="order-price">R$ 239,80</div>
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
                                        <div class="col-md-12 text-center">
                                        <button class="btn btn-outline-warning btn-sm">ver detalhes</button>
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
                                        <h6>#LC12344</h6>
                                        
                                    </div>
                                    <div class="order-info">
                                    <h6>João da Silva</h6>
                                    </div>
                                    <div>
                                        <span class="d-block" style="font-size: 0.9rem; color:var(--light-gray);">18/05/2024 às 10:15</span>
                                        
                                    </div>
                                    
                                    <div>
                                        <span class="status-badge status-novo">Novo</span>
                                    </div>
                                    <div>
                                        <div class="order-price">R$ 239,80</div>
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
                                            <div class="col-md-12 text-center">
                                                <button class="btn btn-outline-warning btn-sm">ver detalhes</button>
                                            </div>
                                        </div>
                                    </div>
                                </div>

                            </div>

                        </div>
                    </div>
                </div>
            </div>
        </form>
    </div>
        <!-- mandar para uma pagina onde o adm poderar gerenciar os pedidos -->
    <div class="row mt-3 d-flex justify-content-between">
        <div class="col col-md-3 text-center" >
            <form class="card" style="color: var(--light-gray);">
                <div class="m-2">
                    <h5><i class="bi bi-box-seam" style="color:#ffca28;"> </i>produtos</h5>
                    <p>gerencie os produtos da sua loja.</p>
                    <button class="btn btn-outline-warning btn-sm m-2">gerenciar</button>
                </div>
            </form>
        </div>
        
        <!-- mandar para uma pagina onde o adm poderar gerenciar os cupons -->
        <div class="col col-md-3 text-center" >
            <form class="card" style="color: var(--light-gray);">
                <div class="m-2">
                    <h5><i class="bi bi-tag" style="color:#ffca28;"> </i>cupons</h5>
                    <p>crie e gerencie cupons de desconto.</p>
                    <button class="btn btn-outline-warning btn-sm">gerenciar</button>
                </div>
            </form>
        </div>
        <!-- mandar para uma pagina onde o adm poderar aconpanha o desempenho da loja -->
        <div class="col col-md-3 text-center" >
            <form class="card" style="color: var(--light-gray);">
                <div class="m-2">
                    <h5><i class="bi bi-graph-up-arrow" style="color:#ffca28;"> </i>relatorios</h5>
                    <p>acompanhe o desempenho da sua loja.</p>
                    <button class="btn btn-outline-warning btn-sm">acessar</button>
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