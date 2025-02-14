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

      <form class="row g-3" action="upd.php" method="post" autocomplete="off">
        <div class="col-md-6">
          <label for="nombreCliente">Nombres</label>
          <input type="text" name="nombreCliente" id="nombreCliente" class="form-control">
        </div>
        <div class="col-md-6">
          <label for="apellidoCliente">Apellidos</label>
          <input type="text" name="apellidoCliente" id="apellidoCliente" class="form-control">
        </div>
        <div class="col-md-6">
          <label for="correoCliente">Correo electronico</label>
          <input type="email" name="correoCliente" id="correoCliente" class="form-control">
        </div>
        <div class="col-md-6">
          <label for="direccionCliente">Direccion</label>
          <input type="text" name="direccionCliente" id="direccionCliente" class="form-control">
        </div>
        <div class="col-md-6">
          <label for="telefonoCliente">Telefono</label>
          <input type="tel" name="telefonoCliente" id="telefonoCliente" class="form-control">
        </div>
        <div class="col-md-6">
          <label for="passwordCliente">Contraseña</label>
          <input type="password" name="passwordCliente" id="passwordCliente" class="form-control">
        </div>
        <div class="col-md-6">
          <label for="repasswordCliente">Repetir contraseña</label>
          <input type="password" name="repasswordCliente" id="repasswordCliente" class="form-control">
        </div>
        <div class="col-12">
          <button class="btn btn-primary" type="submit">Actualizar</button>
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