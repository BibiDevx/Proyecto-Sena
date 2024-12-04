<?php

require '../config/config.php';
require '../config/database.php';

$db = new Database();
$con = $db->conectar();

$errors = [];

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
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"
    integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous">
    </script>
</body>

</html>