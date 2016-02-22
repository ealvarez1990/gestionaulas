<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of ObjetoTabla
 *
 * @author Yahiko
 */
class ObjetoTabla {

    private $numerofila;
    private $numerocolumna;
    private $ocupado;

    function __construct($numerofila = NULL, $numerocolumna = NULL, $ocupado = NULL) {
        $this->numerofila = $numerofila;
        $this->numerocolumna = $numerocolumna;
        $this->ocupado = $ocupado;
    }

    function getNumerofila() {
        return $this->numerofila;
    }

    function getNumerocolumna() {

        return $this->numerocolumna + 1;
    }

    function getOcupado() {
        return $this->ocupado;
    }

    function setNumerofila($numerofila) {
        $this->numerofila = $numerofila;
    }

    function setNumerocolumna($numerocolumna) {
        $this->numerocolumna = $numerocolumna;
    }

    function setOcupado($ocupado) {
        $this->ocupado = $ocupado;
    }

    function leeBD($fechaT, $horaT) {

        $bd = new BaseDatos();
        $model = new ManageReserva($bd);
        $aulaVer = Request::req("idaula");
        $datos = $model->getList();
        $size = count($datos);
        $ocupado = false;
        $idreserva = 0;
        for ($contador = 0; $contador < $size; $contador++) {

            $value = $datos[$contador];

            if ($fechaT == $value->getFecha() && $horaT == $value->getHora() && $value->getIdaula()==$aulaVer) {
                $idreserva = $datos[$contador]->getIdreserva();
                $ocupado = true;
            }
        }
        return $ocupado;
    }

    function getDatosIDreserva($fechaT, $horaT) {

        $bd = new BaseDatos();
        $model = new ManageReserva($bd);
        $aulaVer = Request::req("idaula");
        $datos = $model->getList();
        $size = count($datos);
        $idreserva = 0;

        for ($contador = 0; $contador < $size; $contador++) {
            $value = $datos[$contador];
            if ($fechaT == $value->getFecha() && $horaT == $value->getHora()) {
                $idreserva = $value->getIdreserva();
            }
        }
        return $idreserva;
    }

}
