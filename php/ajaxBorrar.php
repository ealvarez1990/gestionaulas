<?php 

require '../clases/AutoCarga.php';
header('Content-Type: application/json');
$id = Request::req("idreserva");
$sesion = new Session();
$bd = new BaseDatos();
$modelo= new ManageReserva($bd);
$respuesta=$modelo->delete($id);
if ($respuesta) {
    echo '{"r":true}';
} else {
    echo '{"r":false}';
}

