<!-- pagina de login onde o usuario realiza o login-->

<?php 
// adicionar a parte de cima do site
include "includes/menu.php"
?>

<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>LookCenter | login</title>
    <!-- links para o bootstrap, img e style -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Playfair+Display:wght@700&family=Poppins:wght@300;400;600&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="style.css">

    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/css/all.min.css">

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

        .a
        {
        background: transparent; 
        border: 1px solid; 
        color: #f5f5f5ff;
        }
    </style>
</head>

<body>

    <div class="container mt-3">
        <div class="row">
            <!-- "navbar" que fica a esquerda pagina -->
                <h2 class="text-center mb-5" style="color: var(--primary-gold)">altere sua senha</h2>
            
            <!-- painel de pedidos do cliente onde o cliente pode ver todos os pedidos realizado -->
            <div class="justify-content-Center row">
                <div class="col-md-5 orders-panel">
                    <h5 style="color: var(--primary-gold)">Digite o seu E-mail</h5>
                    <p>Enviaremos um codigo de verificação para E-mail digitado abaixo</p>
                    <input type="email" class="form-control mb-3" id="emailLogin" placeholder="Ex: email.123@gmail.com">
                    <button class="btn btn-outline-warning btn-sm col-md-12">ENVIAR CÓDIGO</button>
                    <h5 class="mt-4" style="color: var(--primary-gold)">digite o codigo que foi enviado para o e-mail</h5>
                    <div class="text-center m-2">
                        <input class="a col-md-1" type="text" placeholder="   -"> <input class="a col-md-1" type="text" placeholder="   -"> <input class="a col-md-1" type="text" placeholder="   -"> 
                        <input class="a col-md-1" type="text" placeholder="   -"> <input class="a col-md-1" type="text" placeholder="   -"> <input class="a col-md-1" type="text" placeholder="   -">
                    </div> 
                    <p>Não recebeu o código? <a href="#" style="color: var(--primary-gold)">Reenviar código</a></p>
                    <h5 style="color: var(--primary-gold)">defina sua nova senha</h5>
                    <p class="mb-0">Nova senha:</p>
                    <input type="password" class="form-control" id="senhaLogin">
                    <p class="mb-0 mt-3">Confirmar nova senha:</p>
                    <input type="password" class="form-control mb-3" id="senhaLogin">
                    <button class="btn btn-outline-warning btn-sm col-md-12">alterar senha</button>
                </div>
            </div>
            
        </div>
    </div>


<!-- area do carrinho (offcanva) -->
<?php include "includes/offcar.php" ?>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>

<?php
// adicionar o footer, a parte de baixo do site
include "includes/footer.php"
?>