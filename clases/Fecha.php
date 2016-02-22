<?php

class Fecha {

    private $fechaTrabajo;

    const DIA = 1;
    const MES = 2;
    const ANIO = 3;
    const DIASEMANA = 4;

    function __construct() {

        $this->fechaTrabajo = date('U');
    }

    function getFechaActual() {
        return date('d-m-Y');
    }

    function getFecha() {
        return date('d-m-Y', $this->fechaTrabajo);
    }
    function getFechaModelo2() {
        return date('Y-m-d', $this->fechaTrabajo);
    }

    function get($campo) {
        switch ($campo) {
            case self::DIA:
                return date('d', $this->fechaTrabajo);

                break;
            case self::MES:
                return date('m', $this->fechaTrabajo);

                break;
            case self::ANIO:

                return date('Y', $this->fechaTrabajo);
                break;

            case self::DIASEMANA:

                return date('N', $this->fechaTrabajo);
                break;

            default:
                return -1;
                break;
        }
        return date('d-m-Y');
    }

    function setFecha($dia, $mes, $anio) {
       $this->fechaTrabajo = mktime(0, 0, 0, $mes, $dia, $anio);
    }

    function getFechaDiaSemana($diasemana) {
        $diasemanaFechaTrabajo = $this->get(self::DIASEMANA);
        $diasdiferencia = $diasemanaFechaTrabajo-$diasemana ;
        $fecha = mktime(0, 0, 0, 
                $this->get(self::MES), 
                $this->get(self::DIA) - $diasdiferencia, 
                $this->get(self::ANIO));
        return date('d-m-Y', $fecha);
    }
    
    function addFecha($dia, $mes=0, $anio=0){
        $this->fechaTrabajo = mktime(0, 0, 0, 
                $this->get(self::MES)+$mes, 
                $this->get(self::DIA)+$dia, 
                $this->get(self::ANIO)+$anio);
    }

}
