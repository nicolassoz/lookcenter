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
                        <h5  style="color: var(--light-gray)">Perfil</h5>
                    </div>
                </div>

                <div class="row m-1">
                    <div class="mb-3 col-md-3">
                        <p  style="color: var(--light-gray)">Nome</p>
                        <input type="text" class="form-control"id="nomeCad">
                    </div>

                    <div class=" mb-3 col-md-3">
                        <p  style="color: var(--light-gray)">Email</p>
                        <input type="email" class="form-control" id="emailCad">
                    </div>
                            
                    <div class=" mb-3 col-md-2">
                        <p  style="color: var(--light-gray)">Telefone (opcional)</p>
                        <input type="text" class="form-control" id="telCad">
                    </div>            
                            
                    <div class=" mb-3 col-md-4">
                        <p  style="color: var(--light-gray)">Endereço</p>
                        <input type="text" class="form-control" id="enderecoCad">
                        <ul class="navbar-nav ms-auto">
                            <li class="nav-item "><a class="nav-link" href="arPerfil.php">ver detalhes do endereço</a></li>
                        </ul>
                    </div>

                    <ul class="navbar-nav ms-auto">
                        <li class="nav-item "><a class="nav-link" href="arPerfil.php">Adicionar outro Endereço</a></li>
                    </ul>

                    <ul class="navbar-nav ms-auto">
                        <li class="nav-item "><a class="nav-link" href="#">Alterar senha</a></li>
                    </ul>
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