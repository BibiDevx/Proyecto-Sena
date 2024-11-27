<?php

require './config/config.php';
require './config/database.php';

$db = new Database();
$con=$db->conectar();

$errors=[];

if (!empty($_POST)) {
    $idCliente=trim($_POST['idCliente']);
    $nombre=trim($_POST['nombre']);
    $apellido=trim($_POST['apellido']);
    $email=trim($_POST['email']);
    $telefono=trim($_POST['telefono']);
    $password=trim($_POST['password']);
    $repassword=trim($_POST['repassword']);
}

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

  <main>
    <div class="container">
        <h2>Datos del cliente</h2>
        <form class="row g-3" action="registro.php" method="post" autocomplete="off">
            <div class="col-md-6">
                <label for="nombre"><span class="text-danger">*</span>Nombre</label>
                <input type="text" name="nombre" id="nombre" class="form-control" required>
            </div>
            <div class="col-md-6">
                <label for="apellido"><span class="text-danger">*</span>Apellido</label>
                <input type="text" name="apellido" id="apellido" class="form-control" required>
            </div>
            <div class="col-md-6">
                <label for="idCliente"><span class="text-danger">*</span>Numero de identificacion</label>
                <input type="text" name="idCliente" id="idCliente" class="form-control" required>
            </div>
            <div class="col-md-6">
                <label for="email"><span class="text-danger">*</span>Correo electronico</label>
                <input type="email" name="email" id="email" class="form-control" required>
            </div>
            <div class="col-md-6">
                <label for="telefono"><span class="text-danger">*</span>Telefono</label>
                <input type="tel" name="telefono" id="telefono" class="form-control" required>
            </div>
            <div class="col-md-6">
                <label for="password"><span class="text-danger">*</span>Contraseña</label>
                <input type="password" name="nombre" id="password" class="form-control" required>
            </div>
            <div class="col-md-6">
                <label for="repassword"><span class="text-danger">*</span>Repetir contraseña</label>
                <input type="password" name="repassword" id="repassword" class="form-control" required>
            </div>
            <div class="col-12">
                <button class="btn btn-primary" type="submit">Registrar</button>
            </div>
        </form>
    </div> 
  </main>

  <footer>

  </footer>

  <!--bootstrap-->
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous">
  </script>
</body>

</html>