<div class="navbar navbar-expand-lg navbar-dark bg-primary ">
    <div class="container">
        <a href="index.php" class="navbar-brand">
            <strong>Hastechno</strong>
        </a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarHeader"
            aria-controls="navbarHeader" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarHeader">
            <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                <li class="nav-item">
                    <a href="index.php" class="nav-link">Inicio</a>
                </li>
                <li class="nav-item">
                    <a href="#" class="nav-link ">Productos</a>
                </li>
                <li class="nav-item">
                    <a href="#" class="nav-link ">Marcas</a>
                </li>
            </ul>
            <a href="checkout.php" class="btn btn-success me-3 btn-sm">
                <i class="bi bi-cart-fill">
                    <span id="num_cart" class="badge bg-secondary"><?php echo $num_cart; ?></span>
                </i>
            </a>
            <?php
            if (isset($_SESSION['user_id'])) { ?>

                <div class="dropdown">
                    <button class="btn btn-success btn-sm dropdown-toggle" type="button" id="btn_session"
                        data-bs-toggle="dropdown" aria-expanded="false">
                        <i class="bi bi-person-circle"></i><?php echo $_SESSION['user_name'] ?>
                    </button>
                    <ul class="dropdown-menu" aria-labelledby="btn_session">
                        <li><a class="dropdown-item" href="cuenta.php">Tu cuenta</a></li>
                        <li><a class="dropdown-item" href="edit.php">Historial compra</a></li>
                        <li><a class="dropdown-item" href="edit.php">Editar datos</a></li>
                        <li><a class="dropdown-item" href="logout.php">Cerrar sesion</a></li>
                    </ul>
                </div>
            <?php } else { ?>
                <a href="login.php" class="btn btn-success btn-sm ">
                    <i class="bi bi-person-circle">Login</i>
                </a>
            <?php } ?>
        </div>
    </div>
</div>