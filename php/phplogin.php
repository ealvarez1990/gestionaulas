<?php

require '../clases/AutoCarga.php';
$bd = new BaseDatos();
$email = Request::req("email");
$clave = sha1(Request::req("clave"));
$bd = new BaseDatos();
$sesion = new Session();
$modelo = new ManageUser($bd);
$usuario = $modelo->get($email);
$sesion->setUser($usuario);
if (isset($usuario) && $clave == $sesion->getUser()->getClave()) {
    echo '{"login" : true}';
} else {
    $sesion->destroy();
    $bd->close();
   echo '{"login" : false}';
}


