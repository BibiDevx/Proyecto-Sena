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
            <a href="checkout.php" class="btn btn-success">
                <i class="bi bi-cart-fill">
                    <span id="num_cart" class="badge bg-secondary"><?php echo $num_cart; ?></span>
                </i>
            </a>
            <a href="login.php" class="btn btn-success">
                <i class="bi bi-person-circle"> Login</i>
            </a>
        </div>
    </div>
</div>