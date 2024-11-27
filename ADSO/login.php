<?php

require './config/config.php';
require './config/database.php';

$db = new Database();
$con=$db->conectar();

$errors=[];

?>

<!DOCTYPE html>
<html lang="es">

<head>

  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">

  <title>Hastechno</title>
  <link rel="stylesheet" href="./cliente/css/index.css">
  <!--bootstrap-->
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">

</head>

<body>

  <header>
    <div class="navbar navbar-expand-lg navbar-dark bg-primary ">
      <div class="container">
        <a href="#" class="navbar-brand">
          <strong>Hastechno</strong>
        </a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarHeader" aria-controls="navbarHeader" aria-expanded="false" aria-label="Toggle navigation">
          <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarHeader">
          <ul class="navbar-nav me-auto mb-2 mb-lg-0">
            <li class="nav-item">
              <a href="./cliente/index.php" class="nav-link active">Inicio</a>
            </li>
            <li class="nav-item">
              <a href="#" class="nav-link ">Productos</a>
            </li>
            <li class="nav-item">
              <a href="#" class="nav-link ">Marcas</a>
            </li>
          </ul>
          <a href="../clases/carrito.php" class="btn btn-success">
            <i class="bi bi-cart-fill">
              <span id="num_cart" class="badge bg-secondary"><?php echo $num_cart; ?></span>
            </i>
          </a>
        </div>
      </div>
    </div>
  </header>

  <main class="form-login m-auto pt-4">
    <h2>Iniciar sesion</h2>
    <form class="row g-3" action="login.php" autocomplete="off" method="post">
        <div class="form-floating">
            <input type="text" class="form-control" placeholder="Usuario" name="" id="">
            <label for="usuario">Usuario</label>
        </div>
        <div class="form-floating">
            <input type="password" class="form-control" placeholder="Contraseña" name="password" id="password">
            <label for="password">Contraseña</label>
        </div>
        <div class="">
            <a href="registro.php" class="registro">Registrarse aqui</a>
        </div>
    </form>
  </main>

  <footer>

  </footer>

  <!--bootstrap-->
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous">
  </script>
</body>

</html>