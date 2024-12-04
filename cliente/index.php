<?php

require '../config/config.php';
require '../config/database.php';

$db = new Database();
$con = $db->conectar();

$sql = $con->prepare("SELECT idProducto,nombreProducto,valorProducto FROM producto WHERE disponibilidad=1");
$sql->execute();
$resultado = $sql->fetchAll(PDO::FETCH_ASSOC);

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
      <div class="row row-cols-1 row-cols-sm-2 row-cols-md-3 g-3">
        <?php foreach ($resultado as $row) { ?>
          <div class="col">
            <div class="card shadow-sm">
              <?php
              $idProducto = $row['idProducto'];
              $imagen = "../img/productos/$idProducto/principal.png";

              if (!file_exists($imagen)) {
                $imagen = "../img/no-photo.png";
              }

              ?>
              <img src="<?php echo $imagen; ?>" alt="">
              <div class="card-body">
                <h5 class="card-title"><?php echo $row['nombreProducto']; ?></h5>
                <p class="card-text"><?php echo number_format($row['valorProducto'], 0, ',', '.'); ?></p>
                <div class="d-flex justify-content-between align-items-center">
                  <div class="btn-group">
                    <a href="info.php?idProducto=<?php echo $row['idProducto']; ?>&token=<?php echo hash_hmac('sha1', $row['idProducto'], KEY_TOKEN); ?>"
                      class="btn btn-primary">Info</a>
                  </div>
                  <button class="btn btn-outline-primary" type="button"
                    onclick="addProducto(<?php echo $row['idProducto']; ?>, '<?php echo hash_hmac('sha1', $row['idProducto'], KEY_TOKEN); ?>')">
                    Agregar</button>
                </div>
              </div>
            </div>
          </div>
        <?php } ?>
      </div>
    </div>
  </main>

  <footer>

  </footer>

  <!--bootstrap-->
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"
    integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous">
    </script>
  <script src="./js/agregarCart.js"></script>
</body>

</html>