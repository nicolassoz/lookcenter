
<!-- pagina principal -->

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

        .checkout-steps{
    width: 80%;
    margin: 40px auto;
    display: flex;
    justify-content: space-between;
    position: relative;
}

.linha{
    position: absolute;
    top: 22px;
    left: 0;
    width: 100%;
    height: 2px;
    background: #555;
    z-index: 0;
}

.step{
    position: relative;
    z-index: 1;
    display: flex;
    flex-direction: column;
    align-items: center;
    color: white;
}

.circulo{
    width: 45px;
    height: 45px;
    border-radius: 50%;
    border: 2px solid #777;
    background: #111;
    display: flex;
    align-items: center;
    justify-content: center;
    font-weight: bold;
    transition: .3s;
}

.step span{
    margin-top: 10px;
    font-size: 15px;
}

/* etapas concluídas */
.step.ativo .circulo{
    background: #d4a017;
    border-color: #d4a017;
    color: black;
}

/* etapa atual */
.step.atual .circulo{
    background: #d4a017;
    border-color: #d4a017;
    color: black;
    transform: scale(1.1);
    box-shadow: 0 0 10px rgba(212,160,23,.5);
}

.step.ativo span,
.step.atual span{
    color: #d4a017;
}


.quantidade{
    display: flex;
    align-items: center;
    width: 135px;
    height: 38px;
    border: 1px solid #d4a017;
    border-radius: 8px;
    overflow: hidden;
    
}

.quantidade button{
    width: 40px;
    background: transparent;
    border: none;
    color: #d4a017;
    font-size: 22px;
    cursor: pointer;
    transition: .3s;
}

.quantidade button:hover{
    color: #d4a017;
}

.quantidade input{
    width: 60px;
    height: 100%;
    border: none;
    background: transparent;
    color: white;
    text-align: center;
    font-size: 18px;
    outline: none;
}
    </style>

</head>
<body>
<div class="container">
    
    <div class="checkout-steps">

        <div class="linha"></div>

        <div class="step ativo">
            <div class="circulo">1</div>
            <span>Carrinho</span>
        </div>

        <div class="step ativo">
            <div class="circulo">2</div>
            <span>Endereço</span>
        </div>

        <div class="step ativo">
            <div class="circulo">3</div>
            <span>Pagamento</span>
        </div>

        <div class="step atual">
            <div class="circulo">4</div>
            <span>Confirmação</span>
        </div>

    </div>

        <div class="row">
            <div class="col-md-8">
                <h2 style="color: #ffca28;">seu carrinho</h2>
                <p style="color: white;">revise os os itens antes de continuar.</p>

                <div class="col-lg-12">
                    <div class="orders-panel">
                        <div class="row">
                            <div class="col-md-2">
                                <img src="../roupas/camisas/Camisa_Jersey_Dragão_frente.jpg" class="img-fluid" alt="Camisa">
                                    
                            </div>
                                
                            <div class=" col-md-9">
                                <div class="row">
                                    <p class="col-md-6" style="font-size: 18px;">Camisa polo jersey Dragon</p>
                                    <p class="col-md-5 text-end" style="color: #ffca28; font-size: 16px;">R$ 159,90 </p>
                                    <a class="btn btn-outline-danger col-md-1 justify-content-center" type="button" href="#"><i class="bi bi-trash"></i></a>
                                
                                    <p>cor: Branco </p>
                                    <p class="col-md-9">tamanho: P</p>
                                    <div class="quantidade">
                                        <button type="button" onclick="diminuir()">-</button>
                                        <input type="text" id="qtd" value="1" readonly>
                                        <button type="button" onclick="aumentar()">+</button>
                                    </div>
                                </div>
                            </div>

                            <span class="border-bottom"></span>
                            <br>

                            <div class="col-md-2 mt-3">
                                <img src="../roupas/camisas/Camisa_Jersey_Blunt_Querubins_frente.jpg" class="img-fluid" alt="Camisa">
                            </div>
                            <div class=" col-md-9 mt-3">
                                <div class="row">
                                    <p class="col-md-6" style="font-size: 18px;">CAMISA POLO JERSEY</p>
                                    <p class="col-md-5 text-end" style="color: #ffca28; font-size: 16px;">R$ 159,90 </p>
                                    <a class="btn btn-outline-danger col-md-1 justify-content-center" type="button" href="#"><i class="bi bi-trash"></i></a>
                                    <p>cor: Branco</p>
                                    <p class="col-md-9">tamanho: m</p>
                                    <div class="quantidade">
                                        <button type="button" onclick="dimi()">-</button>
                                        <input type="text" id="qtd1" value="1" readonly>
                                        <button type="button" onclick="aume()">+</button>
                                    </div>
                                </div>
                            </div> 
                        </div>               
                    </div>
                </div>
            </div>

            <div class="col-md-4">
                <h2 style="color: #ffca28;">resumo de pedido</h2>

                    <div class="col-lg-12 col-md-8 mt-4">
                        <div class="orders-panel">
                            <div class="row">
                                <div class="col-8">
                                    <p>subtotal (2 itens)</p>
                                </div>
                                <div class="col-4 text-end">
                                    <p> R$349,80</p>
                                </div>

                                <div class="col-8">
                                    <p>desconto </p>
                                </div>
                                <div class="col-4 text-end">
                                    <p style="color: green;">- R$ 0,00</p>
                                </div>

                                <div class="col-8">
                                    <p>frete</p>
                                </div>
                                <div class="col-4 text-end">
                                    <p style="color: #ffca28;">calcular</p>
                                </div>
                                <span class="border-bottom"></span>

                                <div class="col-8">
                                    <p class="mt-3" style="font-size:18px;">Total </p>
                                </div>
                                <div class="col-4 text-end">
                                    <p class="mt-3" style="color: #ffca28; font-size:20px;"> R$ 349,80</p>
                                </div>

                                <p class="mt-3"><i class="bi bi-lock" style="color: #ffca28;"></i> ambiente seguro. seus dados estão protegido</p>
                            </div>        
                        </div>
                    </div>
            </div>
            <div class="col-md-6 mt-2">
                <a class="btn" type="button" style="background:trasparet; color:var(--accent-gold); border:1px solid; color: #ffca28;" href="#"><i class="bi bi-arrow-left"></i> continuar comprando</a>
            </div>

            <div class="col-md-2 mt-2">
                <a class="btn btn-outline-danger" type="button" href="#"><i class="bi bi-trash"></i> limpar carrinho</a>
            </div>
            
            <h5 class="mt-5" style="color: #ffca28;">tem um cupom de desconto?</h2>
            <div class="col-4">
                <div class="input-group col-3">
                    <input class="form-control" id="senhaLogin" placeholder="digite seu cupom">
                    <a class="btn" type="button" style="background:trasparet; color:var(--accent-gold); border:1px solid; color: #ffca28;" href="#">aplicar</a>
                </div>
            </div>
        </div>
</div>

    <!-- area do carrinho (offcanva) -->
    <?php include "../includes/offcar.php" ?>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>

<script>
    const qtd = document.getElementById("qtd");

function aumentar() {
    qtd.value = parseInt(qtd.value) + 1;
}

function diminuir() {
    if (parseInt(qtd.value) > 1) {
        qtd.value = parseInt(qtd.value) - 1;
    }
}

const qtd1 = document.getElementById("qtd1");

function aume() {
    qtd1.value = parseInt(qtd1.value) + 1;
}

function dimi() {
    if (parseInt(qtd1.value) > 1) {
        qtd1.value = parseInt(qtd1.value) - 1;
    }
}
</script>

<!-- adicionar o footer, a parte de baixo do site -->
<?php 
include "../includes/footer.php";
?>