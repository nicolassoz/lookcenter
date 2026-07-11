
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
        <h2 style="color: #ffca28;">gerenciamento de produtos</h2>
        <a href="../painelAdm.php" class="btn btn-outline-danger"><i class="fa-solid fa-chevron-left me-1"></i> voltar</a>
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
                <p class="mb-0" style="color: var(--light-gray)">Ordenar por</p> 
                <select id="inputState" class="form-select">
                    <option selected>Mais recentes</option>
                </select>
            </div>    

            <div class="col-md-3">
                <p class="mb-0" style="color: var(--light-gray)">estoque</p> 
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
                    <th scope="col">produto</th>
                    <th scope="col">preço</th>
                    <th scope="col">estoque</th>
                    <th scope="col">status</th>
                    <th scope="col">ações</th>
                    </tr>
                </thead>
                <tbody>
                    <tr>
                    <td class="d-flex">
                        <div class="col-md-1">
                            <img src="../roupas/camisas/Camisa_Jersey_Blunt_Querubins_frente.jpg" class="img-fluid" alt="Camisa">
                        </div> <p>CAMISA POLO JERSEY</p><br>
                    </td>
                    <td>R$ 179,90</td>
                    <td>35</td>
                    <td>ativo</td>
                    <td><a href="#" class=""><i class="bi bi-pen" style="color: #ffca28;"></i></a> <a href="#"><i class="bi bi-eye" style="color:white"></i></a> <a href="#"><i class="bi bi-trash" style="color: red;"></i></a></td>
                    </tr>

                    <tr>
                    <td class="d-flex">
                        <div class="col-md-1">
                            <img src="../roupas/camisas/Camisa_Jersey_Dragão_frente.jpg" class="img-fluid" alt="Camisa">
                        </div> <p>Camisa polo jersey Dragon</p></td>
                    <td>R$ 159,90</td>
                    <td>38</td>
                    <td>ativo</td>
                    <td> <a href="#" class=""><i class="bi bi-pen" style="color: #ffca28;"></i></a> <a href="#"><i class="bi bi-eye" style="color:white"></i></a> <a href="#"><i class="bi bi-trash" style="color: red;"></i></a> </td>
                    </tr>

                    <tr>
                    <td class="d-flex">
                        <div class="col-md-1">
                            <img src="../roupas/camisas/Camisa_Polo_Tripside_Tribal_frente.jpg" class="img-fluid" alt="Camisa">
                        </div><p>Camisa Polo Tribal 1977</p></td>
                    <td>R$ 189,90</td>
                    <td>30</td>
                    <td>ativo</td>
                    <td> <a href="#" class=""><i class="bi bi-pen" style="color: #ffca28;"></i></a> <a href="#"><i class="bi bi-eye" style="color:white"></i></a> <a href="#"><i class="bi bi-trash" style="color: red;"></i></a> </td>
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