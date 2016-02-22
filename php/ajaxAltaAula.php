<?php

require '../clases/AutoCarga.php';
$bd = new BaseDatos();
$gestor = new ManageAula($bd);
$nombreaula = Request::req("nombreaula");
$aula = new Aula("", $nombreaula);
$r=$gestor->insert($aula);
$bd->close();
$mensaje=$bd->getError();
if($mensaje[0]!="00000" && $mensaje[1]!=null && $mensaje[2]!=null ){
    echo json_encode(array("altaA"=>false, "mensaje"=>$mensaje));
}else{
    echo json_encode(array("altaA"=>true,  "mensaje"=>$mensaje ));
}
