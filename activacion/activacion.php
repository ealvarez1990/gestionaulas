<?php
require'../clases/AutoCarga.php';
$bd= new BaseDatos();
$gestor= new ManageUser($bd);
$clave=Request::get("clave");
var_dump($clave);
$email=Request::get("email");

$usuario= $gestor->get($email);
$clave2=sha1($email.$usuario->getClave().Configuracion::SEED);
var_dump($clave2);
if($clave==$clave2){
        $usuario->setActivo("1");
        $gestor->set($usuario);
       // header('Location:../index.php');
       echo 'true';
}else{
   //header('Location:../error/error.php?mensaje=No existe el usuario');
   echo 'false';
}
    