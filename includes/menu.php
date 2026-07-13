<?php if(session_status()===PHP_SESSION_NONE)
    {session_start();}
?>

<!-- o navbar do menu -->
<nav class="navbar navbar-expand-lg sticky-top">
    <div class="container">
        <a class="navbar-brand fs-2 fw-bold" href="/lookcenter/index.php">LOOKCENTER</a>
        <button class="navbar-toggler bg-warning" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav">
            <span class="navbar-toggler-icon"></span>
        </button>

        <!-- links que levara as outras paginas -->
        <div class="collapse navbar-collapse" id="navbarNav">
            <ul class="navbar-nav ms-auto">
                <li class="nav-item"><a class="nav-link" href="/lookcenter/index.php">Home</a></li>
                <li class="nav-item"><a class="nav-link" href="/lookcenter/colecao.php">Coleções</a></li>
                <li class="nav-item"><a class="nav-link" href="/lookcenter/sobreNos.php">Sobre Nós</a></li>
                <?php  if(isset($_SESSION["usuario_id"])):?>
                    <?php  if($_SESSION["nivel_id"]==1):?>
                        <li class="nav-item"><a class="nav-link" href="/lookcenter/painelAdm.php">painel</a></li>
                        <?php else:?>
                            <li class="nav-item"><a class="nav-link" href="/lookcenter/perfil.php">perfil</a></li>
                    <?php endif;?>
                        <li class="nav-item exit"><a class="nav-link" href="/lookcenter/logout.php">sair</a></li>   
                    <?php else:?>
                    <li class="nav-item"><a class="nav-link" href="/lookcenter/login.php">login</a></li>
                    <?php endif;?>
                <li class="nav-item"><a class="nav-link" data-bs-toggle="offcanvas" data-bs-target="#offcar">carrinho</a></li>
            </ul>
        </div>
    </div>
</nav>