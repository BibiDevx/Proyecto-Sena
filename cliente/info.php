<?php
require '../config/config.php';
require '../config/database.php';

$db = new Database();
$con = $db->conectar();

$idProducto = isset($_GET['idProducto']) ? $_GET['idProducto'] : '';
$token = isset($_GET['token']) ? $_GET['token'] : '';

if ($idProducto == '' || $token == '') {
  echo 'Erro al procesar peticion';
  exit;
} else {
  $token_tmp = hash_hmac('sha1', $idProducto, KEY_TOKEN);

  if ($token == $token_tmp) {
    $sql = $con->prepare("SELECT count(idProducto) FROM producto WHERE idProducto=? AND disponibilidad=1");
    $sql->execute([$idProducto]);
    if ($sql->fetchColumn() > 0) {
      $sql = $con->prepare("SELECT nombreProducto,definicionProducto,valorProducto FROM producto WHERE idProducto=? AND disponibilidad=1 LIMIT 1");
      $sql->execute([$idProducto]);
      $row = $sql->fetch(PDO::FETCH_ASSOC);

      $nombreProducto = ['nombreProducto'];
      $definicionProducto = ['definicionProducto'];
      $valorProducto = ['valorProducto'];
    }
  } else {
    echo 'Erro al procesar peticion';
    exit;
  }
}

?>

<!DOCTYPE html>
<html lang="es">

<head>

  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">

  <title>Hastechno</title>
  <link rel="stylesheet" href="./css/index.css">
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
      <div class="row">
        <div class="col-md-6 order-md-1 d-flex align-items-center justify-content-center">
          <?php $imagen = "../img/productos/$idProducto/principal.png"; ?>
          <img src="<?php echo $imagen; ?>" alt="" class="img-fluid">
        </div>
        <div class="col-md-6 order-md-2">
          <h2><?php echo $row['nombreProducto']; ?></h2>
          <h2><?php echo MONEDA . number_format($row['valorProducto'], 0, ',', '.'); ?></h2>
          <p class="lead"><?php echo $row['definicionProducto']; ?></p>
          <div class="d-grid gap-3 col-10 mx-auto">
            <button class="btn btn-primary" type="button">Comprar</button>
            <button class="btn btn-outline-primary" type="button"
              onclick="addProducto(<?php echo $idProducto; ?>, '<?php echo $token_tmp; ?>')">
              Agregar</button>
          </div>
        </div>
      </div>
    </div>
  </main>

  <footer>

  </footer>

  <!--bootstrap-->
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"
    integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p"
    crossorigin="anonymous"></script>
  <script src="./js/agregarCart.js"></script>

</body>

</html>