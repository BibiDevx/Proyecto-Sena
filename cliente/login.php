<?php

require '../config/config.php';
require '../config/database.php';
require '../clases/clienteFunciones.php';

$db = new Database();
$con = $db->conectar();

$proceso=isset($_GET['pago']) ? 'pago':'login';

$errors = [];

if (!empty($_POST)) {
  $cedulaCliente = trim($_POST['cedulaCliente']);
  $passwordCliente = trim($_POST['passwordCliente']);
  $proceso = $_POST['proceso'] ?? 'login';


  if (esNulo([$cedulaCliente,$passwordCliente])) {
    $errors[] = 'Debe llenar todos los campos';
  }
  if(count($errors) == 0) {
    $errors[]=login($cedulaCliente,$nombreCliente,$passwordCliente,$con,$proceso);
  }
}
?>

<!DOCTYPE html>
<html lang="es">

<head>

  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">

  <title>Hastechno</title>
  <link rel="stylesheet" href="./css/login.css">
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

    <?php mostrarM($errors);?>

    <form class="row g-3" action="login.php" autocomplete="off" method="post">
      <input type="hidden" name="proceso" value="<?php echo $proceso; ?>">
      <div class="form-floating">
        <input type="text" class="form-control" placeholder="Usuario" name="cedulaCliente" id="cedulaCliente" required>
        <label for="usuario">Usuario</label>
      </div>
      <div class="form-floating">
        <input type="password" class="form-control" placeholder="Contraseña" name="passwordCliente" id="passwordCliente" required>
        <label for="password">Contraseña</label>
      </div>
      <div class="col-12">
        <a href="recupera.php">¿Olvidaste tu contraseña?</a>
      </div>
      <div class="d-grid gap-3 col-12">
        <button  type="submit" class="btn btn-primary">Ingresar</button>
      </div>

      <hr>
      <div class="">
        ¿No tienes cuenta? <a href="registro.php" class="registro">Registrarse aqui</a>
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