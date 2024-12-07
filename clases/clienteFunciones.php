<?php

function esNulo(array $parametros){
    foreach ($parametros as $parametro) {
        if(strlen(trim($parametro))<1){
            return true;
        }
    }
    return false;
}

function esCorreo($correoCliente){
   if(filter_var($correoCliente, FILTER_VALIDATE_EMAIL)){
    return true;
   }
   return false; 
}

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
function validaPassword($passwordCliente,$repasswordCliente){
    if(strcmp($repasswordCliente, $passwordCliente)=== 0){
        return true;
    }
    return false;
}

function usuarioExiste($cedulaCliente, $con){
    $sql =$con-> prepare("SELECT cedulaCliente FROM cliente WHERE cedulaCliente LIKE ? LIMIT 1" );
    $sql->execute([$cedulaCliente]);
    if($sql->fetchColumn()>0){
        return true;
    }
    return false;
}

function emailExiste($correoCliente, $con){
    $sql =$con-> prepare("SELECT cedulaCliente FROM cliente WHERE correoCliente LIKE  ? LIMIT 1" );
    $sql->execute([$correoCliente]);
    if($sql->fetchColumn()>0){
        return true;
    }
    return false;
}
function mostrarM(array $errors){
    if(count($errors)> 0){
        echo '<div class="alert alert-warning alert-dismissible fade show" role="alert"><ul>';
        foreach($errors as $error){
            echo '<li>' . $error .'</li>';
        }
        echo '</ul>';
        echo '<button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button></div>';
    }
}

function login($cedulaCliente,$passwordCliente,$con){
    $sql =$con->prepare('SELECT cedulaCliente,passwordCliente FROM cliente WHERE cedulaCliente LIKE ? LIMIT 1');
    $sql->execute([$cedulaCliente]);
    if($row=$sql->fetch(PDO::FETCH_ASSOC)){
        if(password_verify($passwordCliente,$row['passwordCliente'])){
            $_SESSION['user_id']= $row['cedulaCliente'];
            header('Location: index.php');
            exit;
        }else{
            return 'El usuario y/o contraseña no son correctos';
        }
         
    }
}
?>