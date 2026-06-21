
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
    <link rel="stylesheet" href="style.css">
    
</head>
<body>
<!-- titulo -->
<div class="container mt-3">
    <div class="row">
        <div class="col-md-11">
            <h2  style="color: var(--primary-gold)">Olá Administrador!</h2>
            <p class="footer-text">Bem vindo ao painel da loja.</p>
        </div>
        
            <!-- o usuario poderar litrar os pedidos -->
        <div class="col-md-1">
            <button class="btn dropdown-toggle" type="button" data-bs-toggle="dropdown" aria-expanded="false" style="color: var(--primary-gold);">filtrar</button>
            <ul class="dropdown-menu">
                <li><a class="dropdown-item" href="#">ultimas 24H</a></li>
                <li><a class="dropdown-item" href="#">ultima semana</a></li>
                <li><a class="dropdown-item" href="#">ultimo mes</a></li>
                <li><a class="dropdown-item" href="#">ultimos 3 meses</a></li>
                <li><a class="dropdown-item" href="#">ultimos 6 meses</a></li>
                <li><a class="dropdown-item" href="#">ultimo 1 ano</a></li>
                <li><a class="dropdown-item" href="#">ultimo 2 ano</a></li>
                <li><a class="dropdown-item" href="#">sempre</a></li>
            </ul>
        </div>
    </div>

    <div class="row">
        <div class="col col-md-3 text-center" >
            <form class="card" style="color: var(--light-gray);">
                <div>
                    <p>vendas (hoje)</p>
                    <h3>1.000,00</h3>
                    <p>2.0% vs ontem</p>
                </div>
            </form>
        </div>

        <div class="col col-md-3 text-center" >
            <form class="card" style="color: var(--light-gray);">
                <div>
                    <p>pedidos (hoje)</p>
                    <h3>5</h3>
                    <p>3.2% vs ontem</p>
                </div>
            </form>
        </div>

        <div class="col col-md-3 text-center" >
            <form class="card" style="color: var(--light-gray);">
                <div>
                    <p>clientes</p>
                    <h3>2.728</h3>
                    <p>7.7% este més</p>
                </div>
            </form>
        </div>

        <div class="col col-md-3 text-center" >
            <form class="card" style="color: var(--light-gray);">
                <div>
                    <p>produtos</p>
                    <h3>200</h3>
                    <p>total cadastrados</p>
                </div>
            </form>
        </div>
    </div>

    <div class="col">
        <form class="card">
            <!-- exemplo de pedidos -->
            <table class="table table-dark table-hover mt-1">
                <div class="row">
                        <h5 class="col-md-10 m-2" style="color: var(--light-gray);">pedidos recentes</h5>
                        <ul class="navbar-nav ms-auto col-md-1">
                            <li class="nav-item"><a class="nav-link" href="#">ver todos</a></li>
                        </ul> 
                        
                </div>  
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
        </form>
    </div>

    <div class="row">
        <div class="col col-md-3 text-center" >
            <form class="card" style="color: var(--light-gray);">
                <div>
                    <p>produtos</p>
                    <p>gerencie os produtos da sua loja.</p>
                    <button class="btn btn-outline-warning btn-sm">gerenciar</button>
                </div>
            </form>
        </div>

        <div class="col col-md-3 text-center" >
            <form class="card" style="color: var(--light-gray);">
                <div>
                    <p>clientes</p>
                    <p>veja e gerencie seus clientes.</p>
                    <button class="btn btn-outline-warning btn-sm">gerenciar</button>
                </div>
            </form>
        </div>

        <div class="col col-md-3 text-center" >
            <form class="card" style="color: var(--light-gray);">
                <div>
                    <p>cupons</p>
                    <p>crie e gerencie cupons de desconto.</p>
                    <button class="btn btn-outline-warning btn-sm">gerenciar</button>
                </div>
            </form>
        </div>

        <div class="col col-md-3 text-center" >
            <form class="card" style="color: var(--light-gray);">
                <div>
                    <p>relatorios</p>
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