<?php

require '../config/config.php';
require '../config/database.php';

$db = new Database();
$con = $db->conectar();

$producto = isset($_SESSION['carrito']['productos']) ? $_SESSION['carrito']['productos'] : null;
$listaCarrito = array();

if ($producto != null) {
  foreach ($producto as $clave => $cantidad) {
    $sql = $con->prepare("SELECT idProducto,nombreProducto,valorProducto, $cantidad as cantidad FROM producto WHERE idProducto=? AND disponibilidad=1");
    $sql->execute([$clave]);
    $listaCarrito[] = $sql->fetch(PDO::FETCH_ASSOC);
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
  <link rel="stylesheet" href="./css/checkout.css">
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
      <div class="table-responsive">
        <table class="table">
          <thead>
            <tr>
              <th>Producto</th>
              <th>Nombre</th>
              <th>Precio</th>
              <th>Cantidad</th>
              <th>Subtotal</th>
            </tr>
          </thead>
          <tbody>
            <?php
            if ($listaCarrito == null) {
              echo '<tr><td colspan="6" class="text-center"><b>Lista vacia</b></td></tr>';
            } else {
              $total = 0;
              foreach ($listaCarrito as $producto) {
                $idProducto = $producto['idProducto'];
                $nombreProducto = $producto['nombreProducto'];
                $valorProducto = $producto['valorProducto'];
                $cantidad = $producto['cantidad'];
                $subtotal = $cantidad * $producto['valorProducto'];
                $total += $subtotal;
                ?>
                <tr>
                  <?php $imagen = "../img/productos/$idProducto/principal.png";?>
                  <td class="tablaImg"><img class="img-thumbnail" src="<?php echo $imagen; ?>" alt=""></td>
                  <td class="text-center m-auto"><?php echo $nombreProducto; ?></td>
                  <td><?php echo MONEDA . number_format($valorProducto, 0, ',', '.'); ?></td>
                  <td>
                    <input type="number" step="1" value="<?php echo $cantidad; ?>" size="5" name=""
                      id="cantidad_<?php echo $idProducto; ?>"
                      onchange="actualizarCantidad(this.value,<?php echo $idProducto; ?>)">
                  </td>
                  <td>
                    <div id="subtotal_<?php echo $idProducto; ?>" name="subtotal[]">
                      <?php echo MONEDA . number_format($subtotal, 0, ',', '.'); ?></div>
                  </td>
                  <td><a href="" class="btn btn-danger btn-sm" id="eliminar" data-bs-id="<?php echo $idProducto; ?>"
                      data-bs-toggle="modal" data-bs-target="#eliminaModal"> <i class="bi bi-cart-x-fill"></i>
                    </a></td>
                </tr>
              <?php } ?>
              <tr>
                <td colspan="3"></td>
                <td colspan="2">
                  <p class="h3" id="total"><?php echo MONEDA . number_format($total, 0, ',', '.'); ?></p>
                </td>
              </tr>
            </tbody>
          <?php } ?>
        </table>
      </div>
      <div class="row">
        <div class="col-md-5 offset-md-7 d-grid gap-2">
          <button class="btn-primary btn-lg">Realizar pago</button>
        </div>
      </div>
    </div>
  </main>

  <!-- Modal -->
  <div class="modal fade" id="eliminaModal" tabindex="-1" aria-labelledby="eliminaModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-sm">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="exampleModalLabel">Alerta</h5>
          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <div class="modal-body">
          ¿Desea eliminar el producto?
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cerrar</button>
          <button id="btn-elimina" type="button" class="btn btn-danger" onclick="eliminar()">Eliminar</button>
        </div>
      </div>
    </div>
  </div>
  <footer>

  </footer>

  <!--bootstrap-->
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"
    integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous">
    </script>
  <script src="./js/agregarCart.js"></script>
  <script>
    let eliminaModal = document.getElementById('eliminaModal')
    eliminaModal.addEventListener('show.bs.modal', function (event) {
      let button = event.relatedTarget
      let idProducto = button.getAttribute('data-bs-id')
      let buttonElimina = eliminaModal.querySelector('.modal-footer #btn-elimina')
      buttonElimina.value = idProducto
    })

  </script>
  <script>
    function actualizarCantidad(cantidad, idProducto) {
      let url = '../clases/actualizar_carrito.php'
      let formData = new FormData()
      formData.append('action', 'agregar')
      formData.append('idProducto', idProducto)
      formData.append('cantidad', cantidad)

      fetch(url, {
        method: 'POST',
        body: formData,
        mode: 'cors'
      }).then(reponse => reponse.json())
        .then(data => {
          if (data.ok) {
            let divsubtotal = document.getElementById('subtotal_' + idProducto)
            divsubtotal.innerHTML = data.sub

            let total = 0.00
            let list = document.getElementsByName('subtotal[]')

            for (let i = 0; i < list.length; i++) {
              total += parseFloat(list[i].innerHTML.replace(/[$.]/g, ''))
            }
            total = new Intl.NumberFormat('es-ES', {
              minimumFractionDigits: 0
            }).format(total)
            document.getElementById('total').innerHTML = '<?php echo MONEDA; ?>' + total
          }
        })
    }
  </script>
</body>

</html>