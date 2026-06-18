
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

               <!-- card do perfil -->
        <div class="col">
            <form class="card">
                <div class="row">

                    <!-- titulo -->
                    <div class="m-3 col-md-3" style="color: var(--light-gray)">
                        <h5>Pedidos</h5>
                        <p>veja seus pedidos antigos e novos</p>
                    </div>
                </div>

                <!-- nav que server para listra entre os status -->
                <div class="row">
                    <div class="ms-1 col-md-1">
                        <ul class="navbar-nav ms-auto">
                            <li class="nav-item"><a class="nav-link" href="#">Todos</a></li>
                        </ul> 
                    </div>

                    <div class="col-md-1">
                        <ul class="navbar-nav ms-auto">
                            <li class="nav-item "><a class="nav-link" href="#">Novos</a></li>
                        </ul>
                    </div>

                    <div class="col-md-2">
                        <ul class="navbar-nav ms-auto">
                            <li class="nav-item "><a class="nav-link" href="#">Em andamento</a></li>
                        </ul>
                    </div>

                    <div class="col-md-1">
                        <ul class="navbar-nav ms-auto">
                            <li class="nav-item "><a class="nav-link" href="#">Entregue</a></li>
                        </ul>
                    </div>

                    <div class="col-md-2">
                        <ul class="navbar-nav ms-auto">
                            <li class="nav-item "><a class="nav-link" href="#">Cancelados</a></li>
                        </ul>
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

                <!-- exemplo de pedidos -->
                <table class="table table-dark table-hover mt-1">
                    <tbody>
                        <tr>
                            <th>pedido</th>
                            <th>itens</th>
                            <th>valor (R$100,00)</th>
                            <th>(status) Entregue</th>
                        </tr>
                        <tr>
                            <th>pedido</th>
                            <th>itens</th>
                            <th>valor (R$100,00)</th>
                            <th>(status) Entregue</th>
                        </tr>
                    </tbody>
                </table>

                    <!-- caso tenha muito pedidos o usuario poderar mudar a pagina (tera que aparecer as outras pagina so se necessario)-->
                     <!-- volta -->
                    <ul class="pagination justify-content-Center">
                        <li class="page-item disabled">
                            <a class="page-link" href="#" aria-label="Previous" style="background: transparent;">
                                <span aria-hidden="true">&laquo;</span>
                            </a>
                            <!-- paginas -->
                        </li>
                        <li class="page-item active"><a class="page-link" href="#" style="background: transparent; color: var(--primary-gold);">1</a></li>

                        <li class="page-item"><a class="page-link" href="#" style="background: transparent; color: var(--primary-gold);">2</a></li>

                        <li class="page-item"><a class="page-link" href="#" style="background: transparent; color: var(--primary-gold);">3</a></li>
                        <!-- avança -->
                        <li class="page-item">
                            <a class="page-link" href="#" aria-label="Next" style="background: transparent; color: var(--primary-gold);">
                                <span aria-hidden="true">&raquo;</span>
                            </a>
                        </li>
                    </ul>

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