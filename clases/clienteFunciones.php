<?php

function generarToken(){
    return md5(uniqid(mt_rand(), false));
}
function registrarCliente(array $datos, $con){
    $sql =$con-> prepare("INSERT INTO cliente(idUsuario,nombreCliente,apellidoCliente,cedulaCliente,correoCliente,direccionCliente,telefonoCliente,passwordCliente) VALUES(3,?,?,?,?,?,?,?)");
    if ($sql->execute($datos)) {
        return $con->lastInsertId();
    }
    return 0;
}


?>