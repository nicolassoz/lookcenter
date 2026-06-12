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
                    <div class="m-3 col-md-3">
                        <h5  style="color: var(--light-gray)">Preferências</h5>
                    </div>
                </div>

                <div class="row m-1 justify-content-between">
                    <div class="col-md-3">
                        <p  style="color: var(--light-gray)">Tamanho</p>
                        <select id="inputState" class="form-select">
                            <option selected> </option>
                            <option>p</option>
                            <option>m</option>
                            <option>g</option>
                            <option>gg</option>
                        </select>
                    </div>

                    <div class="col-md-3">
                        <p  style="color: var(--light-gray)">Estilo</p>
                        <select id="inputState" class="form-select">
                        <option selected> </option>
                        </select>
                    </div>

                    <div class="col-md-3">
                        <p  style="color: var(--light-gray)">Endereço</p> <!-- aqui ira aparecer o primeiro endereço que foi cadastrado-->
                        <select id="inputState" class="form-select">
                            <option selected>"endereço atual" </option>
                        </select>
                    </div>

                    <p class="m-3"></p>

                    <div class="justify-content-Center row">
                            <div class="card-body text-center">
                                <a href="cadastro.php" class="btn btn-outline-warning btn-sm">salvar</a>
                            </div>
                    </div>
                    
                </div>
            </form>
        </div> 
    </div>
</div>

<?php include "includes/offcar.php" ?>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>

</body>
</html>
<?php include "includes/footer.php"; ?>