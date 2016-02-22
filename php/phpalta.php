<?php

require '../clases/AutoCarga.php';
$bd = new BaseDatos();
$gestor = new ManageProfesor($bd);
$idprofesor = Request::post("idprofesor");
$clave = Request::post("clave");
$alias = Request::post("nombre");
$apellido = Request::post("apellido");
$usuario = new Profesor($idprofesor, $clave, $alias, $apellido);

$gestor->insert($usuario);
$bd->close();
$mensaje = $bd->getError();

if ($mensaje == "") {
    //header("Location:admin.php?op=No insertado&r=$mensaje[2]");
    echo '{"r" : true}';
} else {
    //header("Location:admin.php?op=Insertado&r=$mensaje[2]");  
    echo '{"r" : false}';
}


