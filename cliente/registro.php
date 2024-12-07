<?php

require '../config/config.php';
require '../config/database.php';
require '../clases/clienteFunciones.php';

$db = new Database();
$con = $db->conectar();

$errors = [];

if (!empty($_POST)) {
  $cedulaCliente = trim($_POST['cedulaCliente']);
  $nombreCliente = trim($_POST['nombreCliente']);
  $apellidoCliente = trim($_POST['apellidoCliente']);
  $correoCliente = trim($_POST['correoCliente']);
  $direccionCliente = trim($_POST['direccionCliente']);
  $telefonoCliente = trim($_POST['telefonoCliente']);
  $passwordCliente = trim($_POST['passwordCliente']);
  $repasswordCliente = trim($_POST['repasswordCliente']); 

  if (esNulo([$nombreCliente, $apellidoCliente, $cedulaCliente, $correoCliente, $direccionCliente, $telefonoCliente, $passwordCliente, $repasswordCliente])) {
    $errors[] = 'Debe llenar todos los campos';
  }
  if (!esCorreo($correoCliente)) {
    $errors[] = "La direccion de correo no es valida";
  }

  if (usuarioExiste($cedulaCliente, $con)) {
    $errors[] = "Usuario $cedulaCliente ya existe";
  }
  if (emailExiste($correoCliente, $con)) {
    $errors[] = "El correo electronico $correoCliente ya existe";
  }

  if (!validaPassword($passwordCliente, $repasswordCliente)) {
    $errors[] = "Las contraseñas no coinciden";
  }

  $prueba = "error al funcionar";
  $pass_hash = password_hash($passwordCliente, PASSWORD_DEFAULT);

  if (count($errors) == 0) {
    $idCliente = registrarCliente([$nombreCliente, $apellidoCliente, $cedulaCliente, $correoCliente, $direccionCliente, $telefonoCliente, $pass_hash], $con);
    if ($idCliente < 0) {
      return $prueba;
    }
  }
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
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet"
    integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">

</head>

<body>

  <header>
    <?php require_once('../plantilla/header.php'); ?>
  </header>

  <main>
    <div class="container">
      <h2>Datos del cliente</h2>

      <?php mostrarM($errors);?>

      <form class="row g-3" action="registro.php" method="post" autocomplete="off">
        <div class="col-md-6">
          <label for="nombreCliente"><span class="text-danger">*</span>Nombres</label>
          <input type="text" name="nombreCliente" id="nombreCliente" class="form-control" required>
        </div>
        <div class="col-md-6">
          <label for="apellidoCliente"><span class="text-danger">*</span>Apellidos</label>
          <input type="text" name="apellidoCliente" id="apellidoCliente" class="form-control" required>
        </div>
        <div class="col-md-6">
          <label for="cedulaCliente"><span class="text-danger">*</span>Numero de identificacion</label>
          <input type="text" name="cedulaCliente" id="cedulaCliente" class="form-control" required>
        </div>
        <div class="col-md-6">
          <label for="correoCliente"><span class="text-danger">*</span>Correo electronico</label>
          <input type="email" name="correoCliente" id="correoCliente" class="form-control" required>
        </div>
        <div class="col-md-6">
          <label for="direccionCliente"><span class="text-danger">*</span>Direccion</label>
          <input type="text" name="direccionCliente" id="direccionCliente" class="form-control" required>
        </div>
        <div class="col-md-6">
          <label for="telefonoCliente"><span class="text-danger">*</span>Telefono</label>
          <input type="tel" name="telefonoCliente" id="telefonoCliente" class="form-control" required>
        </div>
        <div class="col-md-6">
          <label for="passwordCliente"><span class="text-danger">*</span>Contraseña</label>
          <input type="password" name="passwordCliente" id="passwordCliente" class="form-control" required>
        </div>
        <div class="col-md-6">
          <label for="repasswordCliente"><span class="text-danger">*</span>Repetir contraseña</label>
          <input type="password" name="repasswordCliente" id="repasswordCliente" class="form-control" required>
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
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"
    integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous">
    </script>
</body>

</html>