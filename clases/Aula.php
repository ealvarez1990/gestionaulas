<?php

class Aula {

    private $idaula;
    private $nombreaula;

    function __construct($idaula=NULL, $nombreaula=NULL) {
        $this->idaula = $idaula;
        $this->nombreaula = $nombreaula;
    }

    public function getIdaula() {
        return $this->idaula;
    }

    public function getNombreaula() {
        return $this->nombreaula;
    }

    public function setIdaula($idaula) {
        $this->idaula = $idaula;
    }

    public function setNombrepista($nombreaula) {
        $this->nombreaula = $nombreaula;
    }

    function set($datos, $inicio = 0) {
        $this->idaula = $datos[0 + $inicio];
        $this->nombreaula = $datos[1 + $inicio];
        
    }
     function get(){
        $params=array();
        foreach ($this as $key => $value) {
            $params[$key]=$value;
        }
        return $params;
    }

}
