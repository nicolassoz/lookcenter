
<!-- pagina da area do adm (so o adm pode acessar esta area)-->

<?php 
// adicionar a parte de cima do site
include "../includes/menu.php";
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
    <link rel="stylesheet" href="../style.css">

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
    
    <div class="d-flex justify-content-between">
        <h2 style="color: #ffca28;">gerenciamento de cupons</h2>
        <a href="#" class="pagination-btn">+ Novo Cupom</a>
        <a href="../painelAdm.php" class="btn btn-outline-danger"><i class="fa-solid fa-chevron-left me-1"></i> voltar</a>
    </div>

    <div class="row">
        <div class="col col-md-3 text-center" >
            <form class="card" style="color: var(--light-gray);">
                <div>
                    <p>Total de cupons</p>
                    <h3><i class="bi bi-ticket"></i> 48</h3>
                    <span>+8 este mês</span>
                </div>
            </form>
        </div>

        <div class="col col-md-3 text-center" >
            <form class="card" style="color: var(--light-gray);">
                <div>
                    <p>Cupons Ativos</p>
                    <h3><i class="bi bi-tag"></i> 32</h3>
                    <span>66,7% do total</span>
                </div>
            </form>
        </div>
        <!-- total de cliente -->
        <div class="col col-md-3 text-center" >
            <form class="card" style="color: var(--light-gray);">
                <div>
                    <p>Usados Este Mês</p>
                    <h3><i class="bi bi-calendar"></i> 152</h3>
                    <span>+23 este més</span>
                </div>
            </form>
        </div>
        <!-- total de produtos em estoque -->
        <div class="col col-md-3 text-center" >
            <form class="card" style="color: var(--light-gray);">
                <div>
                    <p>Desconto Gerado</p>
                    <h3><i class="bi bi-coin"></i> R$ 3.245,50</h3>
                    <span>este mês</span>
                </div>
            </form>
        </div>
    </div>

    <div class="orders-panel">
        <div class="row">
            <div class="col-md-3">
                <input type="text" class="form-control" id="numCart" placeholder=" Buscar produto...">
            </div>    

            <div class="col-md-2">
                <p class="mb-0" style="color: var(--light-gray)">Status</p> 
                <select id="inputState" class="form-select">
                    <option selected>Todos</option>
                </select>
            </div>    

            <div class="col-md-3">
                <p class="mb-0" style="color: var(--light-gray)">Tipos de desconto</p> 
                <select id="inputState" class="form-select">
                    <option selected>Mais recentes</option>
                </select>
            </div>    

            <div class="col-md-3">
                <p class="mb-0" style="color: var(--light-gray)">validade</p> 
                <select id="inputState" class="form-select">
                    <option selected>todos</option>
                </select>
            </div>

            <div class="col-md-1">
                <button class="btn dropdown-toggle" type="button" data-bs-toggle="dropdown" aria-expanded="false" style="color: var(--primary-gold);">filtrar</button>
                    <ul class="dropdown-menu">
                        <li><a class="dropdown-item" href="#">mais recente</a></li>
                        <li><a class="dropdown-item" href="#">mais antigo</a></li>
                        <li><a class="dropdown-item" href="#">em 3 meses</a></li>
                        <li><a class="dropdown-item" href="#">em 6 meses</a></li>
                        <li><a class="dropdown-item" href="#">em 1 ano</a></li>
                    </ul>
            </div>

                <table class="table table-dark mt-2">
                <thead>
                    <tr>
                    <th scope="col">Cupom</th>
                    <th scope="col">Tipo</th>
                    <th scope="col">Desconto</th>
                    <th scope="col">Valor Minimo</th>
                    <th scope="col">Uso</th>
                    <th scope="col">Validade</th>
                    <th scope="col">Status</th>
                    <th scope="col">Açoes</th>
                    </tr>
                </thead>
                <tbody>
                    <tr>
                    <td>
                    <i class="bi bi-ticket"></i>
                    <p>10% de desconto em todo site</p>
                    </td>
                    <td>Percentual</td>
                    <td>10%</td>
                    <td>R$ 100,00</td>
                    <td>125/<i class="bi bi-infinity"></i><br>inimitado</td>
                    <td>>01/05/2026<br>31/05/2026</td>
                    <td>Ativo</td>
                    <td><a href="#" class=""><i class="bi bi-pen" style="color: #ffca28;"></i></a> <a href="#"><i class="bi bi-eye" style="color:white"></i></a> <a href="#"><i class="bi bi-trash" style="color: red;"></i></a></td>
                    </tr>

                    <tr>
                    <td>
                    <i class="bi bi-ticket"></i>
                    <p>Frete grátis acima de R$ 199,00</p>
                    </td>
                    <td>Frete Grátis</td>
                    <td>100%</td>
                    <td>R$ 199,00</td>
                    <td>87/<i class="bi bi-infinity"></i><br>inimitado</td>
                    <td>>01/05/2026<br>31/05/2026</td>
                    <td>Ativo</td>
                    <td><a href="#" class=""><i class="bi bi-pen" style="color: #ffca28;"></i></a> <a href="#"><i class="bi bi-eye" style="color:white"></i></a> <a href="#"><i class="bi bi-trash" style="color: red;"></i></a></td>
                    </tr>

                    <tr>
                    <td>
                    <i class="bi bi-ticket"></i>
                    <p>R$ 30,00 de desconto acima de 300</p>
                    </td>
                    <td>Valor fixo</td>
                    <td>R$ 30,00</td>
                    <td>R$ 300,00</td>
                    <td>45/150</td>
                    <td>>15/04/2026<br>15/05/2026</td>
                    <td>inativo</td>
                    <td><a href="#" class=""><i class="bi bi-pen" style="color: #ffca28;"></i></a> <a href="#"><i class="bi bi-eye" style="color:white"></i></a> <a href="#"><i class="bi bi-trash" style="color: red;"></i></a></td>
                    </tr>
                </tbody>
                </table>

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

<!-- area do carrinho (offcanva) -->
<?php include "../includes/offcar.php" ?>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>

</body>
</html>

<!-- adicionar o footer, a parte de baixo do site -->
<?php include "../includes/footer.php"; ?>