<?php

class Reserva {

    private $idreserva;
    private $idaula;
    private $idusuario;
    private $fecha;
    private $hora;
    private $cola;

    function __construct($idreserva = NULL, $idaula = NULL, $idusuario = NULL, $fecha = NULL, $hora = NULL, $cola = NULL) {
        $this->idreserva = $idreserva;
        $this->idaula = $idaula;
        $this->idusuario = $idusuario;
        $this->fecha = $fecha;
        $this->hora = $hora;
        $this->cola = $cola;
    }

    public function getIdreserva() {

        return $this->idreserva;
    }

    public function getIdaula() {
        return $this->idaula;
    }

    public function getIdusuario() {
        return $this->idusuario;
    }

    public function getFecha() {
        return $this->fecha;
    }

    public function getHora() {
        return $this->hora;
    }

    public function setIdreserva($idreserva) {
        $this->idreserva = $idreserva;
    }

    public function setIdaula($idaula) {
        $this->idaula = $idaula;
    }

    public function setIdusuario($idusuario) {
        $this->idusuario = $idusuario;
    }

    public function setFecha($fecha) {
        $this->fecha = $fecha;
    }

    public function setHora($hora) {
        $this->hora = $hora;
    }

    function getCola() {
        return $this->cola;
    }

    function setCola($cola) {
        $this->cola = $cola;
    }

    function set($datos, $inicio = 0) {
        $this->idreserva = $datos[0 + $inicio];
        $this->idaula = $datos[1 + $inicio];
        $this->idusuario = $datos[2 + $inicio];
        $this->fecha = $datos[3 + $inicio];
        $this->hora = $datos[4 + $inicio];
        $this->cola = $datos[5 + $inicio];
    }
    
    function get() {
        $params = array();
        foreach ($this as $key => $value) {
            $params[$key] = $value;
        }
        return $params;
    }

    public function getJSON() {
        $prop = get_object_vars($this);
        $resp = '{';
        foreach ($prop as $key => $value) {
            $resp .= '"' . $key . '":' . json_encode(htmlspecialchars_decode($value)) . ',';
        }
        $resp = substr($resp, 0, -1) . "}";
        return $resp;
    }

}
