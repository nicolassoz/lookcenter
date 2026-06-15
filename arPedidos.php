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


<div class="container mt-3">
    <div class="row align-items-start">
        <div class="col-md-1">
            <ul class="navbar-nav ms-auto">
                        <li class="nav-item "><a class="nav-link" href="arPerfil.php">perfil</a></li>
                        <li class="nav-item "><a class="nav-link" href="arPedidos.php">pedidos</a></li>
                        <li class="nav-item "><a class="nav-link" href="arPreferencias.php">Preferências</a></li>
            </ul> 
        </div>

        <div class="col">
            <form class="card">
                <div class="row">
                    <div class="m-3 col-md-3" style="color: var(--light-gray)">
                        <h5>Pedidos</h5>
                        <p>veja seus pedidos antigos e novos</p>
                    </div>
                </div>

                <div class="row">
                    <div class="ms-1 col-md-1">
                        <p  style="color: var(--light-gray)">Todos</p>
                    </div>

                    <div class="col-md-1">
                        <p  style="color: var(--light-gray)">Novos</p>
                    </div>

                    <div class="col-md-2">
                        <p  style="color: var(--light-gray)">Em andamento</p>
                    </div>

                    <div class="col-md-1">
                        <p  style="color: var(--light-gray)">Entregue</p>
                    </div>

                    <div class="col-md-2">
                        <p  style="color: var(--light-gray)">Cancelados</p>
                    </div>

                    <div class="col-md-3">
                        <input type="text" class="form-control"id="nomeCad">
                    </div>

                    <div class="col-md-1">
                        <a href="#" class="btn btn-outline-warning btn-sm">Filtrar</a>
                    </div>
                </div>    


                <main class="container mt-2">
                <table class="table">
                    
                    <tr>
                        <td>pedido #abc00001</td>
                        <td>2 itens</td>
                        <td>199</td>
                        <td>
                            <p style="color: blue;" >Entregue</p>
                        </td>
                        </tr>

                </table>




                <nav aria-label="Page navigation example">
                    <ul class="pagination justify-content-Center">
                        <li class="page-item">
                        <a class="page-link" href="#" aria-label="Previous">
                            <span aria-hidden="true">&laquo;</span>
                        </a>
                        </li>
                        <li class="page-item"><a class="page-link" href="#">1</a></li>
                        <li class="page-item"><a class="page-link" href="#">2</a></li>
                        <li class="page-item"><a class="page-link" href="#">3</a></li>
                        <li class="page-item">
                        <a class="page-link" href="#" aria-label="Next">
                            <span aria-hidden="true">&raquo;</span>
                        </a>
                        </li>
                    </ul>
                </nav>

            </form>
        </div> 
    </div>
</div>

<?php include "includes/offcar.php" ?>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>

</body>
</html>
<?php include "includes/footer.php"; ?>