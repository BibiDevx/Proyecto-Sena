<?php

require '../config/config.php';
require '../config/database.php';

if (isset($_POST['action'])) {

    $action = $_POST['action'];
    $idProducto = isset($_POST['idProducto']) ? $_POST['idProducto'] : 0;
    if ($action == 'agregar') {
        $cantidad = isset($_POST['cantidad']) ? $_POST['cantidad'] : 0;
        $respuesta = agregar($idProducto, $cantidad);
        if ($respuesta > 0) {
            $datos['ok'] = true;
        } else {
            $datos['ok'] = false;
        }
        $datos['sub'] = MONEDA . number_format($respuesta, 0, ',', '.');
    } else if ($action == 'eliminar') {
        $datos['ok'] = true;
        eliminar($idProducto);
    } else {
        $datos['ok'] = false;
    }
} else {
    $datos['ok'] = false;
}

echo json_encode($datos);

function agregar($idProducto, $cantidad){
    $res = 0;
    if ($idProducto > 0 && $cantidad > 0 && is_numeric(($cantidad))) {
        if (isset($_SESSION['carrito']['productos'][$idProducto])) {
            $_SESSION['carrito']['productos'][$idProducto] = $cantidad;
            $db = new Database();
            $con = $db->conectar();
            $sql = $con->prepare("SELECT valorProducto FROM producto WHERE idProducto=? AND idProveedor=1 LIMIT 1");
            $sql->execute([$idProducto]);
            $row = $sql->fetch(PDO::FETCH_ASSOC);
            $valorProducto = ['valorProducto'];
            $res = $cantidad * $row['valorProducto'];

            return $res;
        }
    } else {
        return $res;
    }
}
function eliminar($idProducto){
    if ($idProducto > 0) {
        if (isset($_SESSION['carrito']['productos'][$idProducto])) {
            unset($_SESSION['carrito']['productos'][$idProducto]);
            return true;
        }
    } else {
        return false;
    }
}

?>