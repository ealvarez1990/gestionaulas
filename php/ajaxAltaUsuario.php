<?php

require '../clases/AutoCarga.php';
$bd = new BaseDatos();
$gestor = new ManageUser($bd);
$email = Request::req("email");
$clave = Request::req("clave");
$alias = Request::req("alias");
$fecha_alta = date("Y-m-d H:i:s");
$activo = 0;
$personal = 0;
$administrador=0;
$usuario = new Usuario($email, sha1($clave), $alias, $fecha_alta, $activo, $personal, $administrador);
$r=$gestor->insert($usuario);
$bd->close();
$mensaje=$bd->getError();
if($mensaje[0]!="00000" && $mensaje[1]!=null && $mensaje[2]!=null ){
    echo json_encode(array("altaU"=>false, "mensaje"=>$mensaje));
}else{
    echo json_encode(array("altaU"=>true,  "mensaje"=>$mensaje ));
}
