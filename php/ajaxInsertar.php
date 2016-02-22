<?php

require '../clases/AutoCarga.php';
header('Content-Type: application/json');
$bd = new BaseDatos();
$modelo = new ManageReserva($bd);
$idaula = Request::req("idaula");
$idusuario = Request::req("idusuario");
$fecha = Request::req("fecha");
$hora = Request::req("hora");
$respuesta = Request::req("respuesta");
$reservas = $modelo->getList();
$correcto = "";
foreach ($reservas as $key => $value) {
    if (isset($reservas)) {
        if ($reservas[$key]->getFecha() == $fecha && $reservas[$key]->getHora() == $hora) {
            $idreserva=$value->getIdreserva();
            var_dump($idreserva);
            $reserva_cola=$modelo->get($idreserva);
            $reserva_cola->setCola($idusuario);
            $modelo->set($reserva_cola);
            $mensaje = $bd->getError();
            $correcto = false;
        } else {
            $correcto = true;
        }
    } else {
        $correcto = false;
    }
}

if ($correcto) {
    $reserva = new Reserva("", $idaula, $idusuario, $fecha, $hora, "");
    $resultado = $modelo->insert($reserva);
    $mensaje = $bd->getError();
    echo json_encode(array("r" => true));
} else {
    echo json_encode(array("r" => false));
}
$bd->close();

