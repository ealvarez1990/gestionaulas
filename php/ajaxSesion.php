<?php

require '../clases/AutoCarga.php';
header('Content-Type: application/json');

$bd = new BaseDatos();
$modelo = new ManageUser($bd);


if (Request::req("dlogin")) {
//LOGIN
    $sesion = new Session();
    $email = Request::req("email");
    $clave = sha1(Request::req("clave"));
    $sesion->setUser($modelo->get($email));
    $usuario = $sesion->getUser();
    if(isset($usuario) && $clave == $sesion->getUser()->getClave()) {
       
        echo json_encode(["login"=>true, "email"=>$sesion->getUser()->getEmail(), "usuario"=>$sesion->getUser()->getAlias(), "activo"=>$sesion->getUser()->getActivo(), "personal"=>$sesion->getUser()->getPersonal(), 
            "administrador"=>$sesion->getUser()->getAdministrador()]);
    } else {
        $sesion->destroy();
        $bd->close();
        echo '{"login" : false}';
    }
} else {
//SESION
     $sesion = new Session();
    if (!$sesion->isLogged()) {
        echo '{"login" : false}';
    } else {
        if ($sesion->getUser()->getActivo() != 1) {
            $sesion->destroy();
            $bd->close();
            echo '{"login" : false}';
        } else {
            echo json_encode(["login"=>true, "email"=>$sesion->getUser()->getEmail(), "usuario"=>$sesion->getUser()->getAlias(), "activo"=>$sesion->getUser()->getActivo(), "personal"=>$sesion->getUser()->getPersonal(), 
            "administrador"=>$sesion->getUser()->getAdministrador()]);
        }
    }
}
    