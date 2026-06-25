
<!-- pagina da area de pedidos (o usuario podera ver as informações do perfil)-->

<!-- adicionar a parte de cima do site -->
<?php include "includes/menu.php"; ?>
<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>LookCenter - Meus Pedidos</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Playfair+Display:wght@700&family=Poppins:wght@300;400;600&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/css/all.min.css">
    <link rel="stylesheet" href="style.css">
    
    <style>
        /* Cores de Identidade */
        :root {
            --bg-dark: #090909;
            --card-dark: #111111;
            --border-gold: #ffcc00;
            --text-gold: #ffcc00;
            --text-gray: #a0a0a0;
        }

        body {
            background-color: var(--bg-dark);
            color: #ffffff;
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
        }

        /* Navbar */
        .navbar {
            border-bottom: 1px solid #222;
        }
        .navbar-brand {
            color: var(--text-gold) !important;
            font-weight: bold;
            font-size: 1.5rem;
            letter-spacing: 1px;
        }
        .nav-link {
            color: #ffffff !important;
            font-size: 0.95rem;
            margin-left: 15px;
        }
        .nav-link:hover, .nav-link.active {
            color: var(--text-gold) !important;
        }

        /* Sidebar Navigation */
        .sidebar-menu {
            list-style: none;
            padding-left: 0;
        }
        .sidebar-menu li {
            margin-bottom: 15px;
        }
        .sidebar-menu a {
            color: #ffffff;
            text-decoration: none;
            font-size: 0.95rem;
            display: block;
            padding: 5px 0;
            transition: 0.2s;
        }
        .sidebar-menu a:hover {
            color: var(--text-gold);
        }
        .sidebar-menu li.active {
            border-left: 3px solid var(--border-gold);
            padding-left: 10px;
        }
        .sidebar-menu li.active a {
            color: var(--text-gold);
            font-weight: bold;
        }

        /* Card de Ajuda */
        .help-card {
            border: 1px solid #333;
            border-radius: 8px;
            padding: 20px;
            text-align: center;
            margin-top: 30px;
        }
        .help-card i {
            color: var(--text-gold);
            font-size: 1.5rem;
            margin-bottom: 10px;
        }
        .help-card a {
            color: var(--text-gold);
            text-decoration: none;
            font-size: 0.9rem;
            font-weight: bold;
        }

        /* Painel Principal de Pedidos */
        .orders-panel {
            background-color: var(--card-dark);
            border: 1px solid #222;
            border-radius: 10px;
            padding: 25px;
        }
        .orders-panel h2 {
            font-size: 1.4rem;
            font-weight: 600;
        }
        .orders-panel p {
            color: var(--text-gray);
            font-size: 0.9rem;
        }

        /* Abas de Filtro */
        .filter-tabs .nav-link {
            color: #ffffff !important;
            margin-left: 0;
            margin-right: 15px;
            padding: 5px 0;
            border: none;
            background: none;
            font-size: 0.9rem;
        }
        .filter-tabs .nav-link.active {
            color: var(--text-gold) !important;
            border-bottom: 2px solid var(--border-gold) !important;
            border-radius: 0;
        }

        /* Barra de Busca e Botão Filtrar */
        .search-input {
            background-color: transparent;
            border: 1px solid #333;
            color: #fff;
            font-size: 0.9rem;
            border-radius: 6px;
        }
        .search-input::placeholder {
            color: #666;
        }
        .search-input:focus {
            background-color: transparent;
            border-color: var(--border-gold);
            color: #fff;
            box-shadow: none;
        }
        .btn-filter {
            border: 1px solid var(--border-gold);
            color: var(--text-gold);
            background: transparent;
            font-size: 0.9rem;
            border-radius: 6px;
            padding: 4px 12px;
        }
        .btn-filter:hover {
            background-color: var(--text-gold);
            color: #000;
        }

        /* Itens da Lista de Pedidos */
        .order-item {
            border: 1px solid #222;
            border-radius: 8px;
            padding: 15px 20px;
            margin-bottom: 12px;
            transition: 0.2s;
        }
        .order-item:hover {
            border-color: #444;
        }
        .order-info h6 {
            margin-bottom: 3px;
            font-size: 0.95rem;
        }
        .order-info span {
            font-size: 0.8rem;
            color: var(--text-gray);
        }
        .order-details-link {
            color: var(--text-gold);
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
        }
        .order-payment {
            font-size: 0.8rem;
            color: var(--text-gray);
        }

        /* Status Badges */
        .status-badge {
            font-size: 0.75rem;
            padding: 5px 12px;
            border-radius: 20px;
            font-weight: 500;
        }
        .status-entregue { background-color: rgba(25, 135, 84, 0.2); color: #25c36e; }
        .status-andamento { background-color: rgba(13, 110, 253, 0.2); color: #3b82f6; }
        .status-novo { background-color: rgba(255, 193, 7, 0.2); color: #ffca28; }
        .status-cancelado { background-color: rgba(108, 117, 125, 0.2); color: #a0a0a0; }

        .arrow-icon {
            color: var(--text-gold);
            font-size: 0.9rem;
        }

        /* Paginação */
        .pagination-btn {
            border: 1px solid var(--border-gold);
            color: var(--text-gold);
            background: transparent;
            font-size: 0.85rem;
            padding: 5px 15px;
            border-radius: 5px;
            text-decoration: none;
        }
        .pagination-btn:hover {
            background-color: var(--text-gold);
            color: #000;
        }
        .page-number {
            color: var(--text-gray);
            text-decoration: none;
            margin: 0 8px;
            font-size: 0.9rem;
        }
        .page-number.active {
            background-color: var(--text-gold);
            color: #000;
            padding: 3px 9px;
            border-radius: 4px;
            font-weight: bold;
        }

        /* Rodapé */
        footer {
            border-top: 1px solid var(--border-gold);
            padding: 40px 0;
            margin-top: 60px;
        }
        footer h4 {
            color: var(--text-gold);
            font-weight: 500;
            font-size: 1.4rem;
        }
        footer p {
            color: var(--text-gray);
            font-size: 0.9rem;
            max-width: 700px;
            margin: 10px auto;
        }
        footer a {
            color: var(--text-gold);
            text-decoration: none;
            margin: 0 10px;
            font-size: 0.95rem;
        }
        footer a:hover {
            text-decoration: underline;
        }
        .copyright {
            font-size: 0.8rem !important;
            color: #555 !important;
            margin-top: 20px;
        }
    </style>
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

            <div class="col-lg-9 col-md-8">
                <div class="orders-panel">
                    <h2>Pedidos</h2>
                    <p class="mb-4">Acompanhe seus pedidos novos e antigos.</p>

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
                        <div class="col-lg-4 col-6">
                            <input type="text" class="form-control search-input" placeholder="Buscar pedido...">
                        </div>
                        <div class="col-lg-1 col-6 text-end">
                            <button class="btn btn-filter w-100"><i class="fa-solid fa-sliders me-1"></i> Filtrar</button>
                        </div>
                    </div>

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
                                <span class="d-block" style="font-size: 0.9rem;">3 itens</span>
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
                                <h6 style="color: var(--text-gold); font-size: 0.95rem;">Produtos deste pedido:</h6>
                                <ul class="list-unstyled mb-3 text-white-50">
                                    <li><i class="fa-solid fa-circle font-xs me-2" style="font-size: 6px; vertical-align: middle;"></i> 1x Camiseta Over Void Preta - G (R$ 159,90)</li>
                                    <li><i class="fa-solid fa-circle font-xs me-2" style="font-size: 6px; vertical-align: middle;"></i> 1x Calça Cargo Street Preta - 42 (R$ 220,00)</li>
                                    <li><i class="fa-solid fa-circle font-xs me-2" style="font-size: 6px; vertical-align: middle;"></i> 1x Boné Strapback Classic - Único (R$ 80,00)</li>
                                </ul>
                                <div class="row pt-2" style="border-top: 1px solid #222;">
                                    <div class="col-md-6">
                                        <span class="d-block text-muted">Endereço de Entrega:</span>
                                        <span>Rua das Flores, 123 - Centro, São Paulo - SP</span>
                                    </div>
                                    <div class="col-md-6 text-md-end mt-2 mt-md-0">
                                        <span class="d-block text-muted">Código de Rastreio:</span>
                                        <a href="#" style="color: var(--text-gold); text-decoration: none;"><i class="fa-solid fa-truck me-1"></i> BR123456789BR</a>
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
                                <span class="d-block" style="font-size: 0.9rem;">2 itens</span>
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
                                <h6 style="color: var(--text-gold); font-size: 0.95rem;">Produtos deste pedido:</h6>
                                <ul class="list-unstyled mb-3 text-white-50">
                                    <li><i class="fa-solid fa-circle font-xs me-2" style="font-size: 6px; vertical-align: middle;"></i> 2x Camiseta Basic LookCenter - M (R$ 119,90 cada)</li>
                                </ul>
                                <div class="row pt-2" style="border-top: 1px solid #222;">
                                    <div class="col-md-6">
                                        <span class="d-block text-muted">Status do Envio:</span>
                                        <span class="text-info"><i class="fa-solid fa-box-open me-1"></i> O vendedor está preparando o seu pacote.</span>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

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

    <!-- area do carrinho (offcanva) -->
<?php include "includes/offcar.php" ?>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>

</body>
</html>

<!-- adicionar o footer, a parte de baixo do site -->
<?php include "includes/footer.php"; ?>