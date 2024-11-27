<?php

function generarToken(){
return md5(uniqid(mt_rand(),false));
}
function registrar(array $datos, $con){
    $sql="INSERT INTO clientes(nombre,apellido,idCliente,email,telefono,password,repassword)";
}

?>