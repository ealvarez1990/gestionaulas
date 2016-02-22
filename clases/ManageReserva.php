<?php

class ManageReserva {

    private $bd = NULL;
    private $tabla = 'reserva';

    function __construct(BaseDatos $bd) {
        $this->bd = $bd;
    }

    function set(Reserva $reserva) {
        //return $this->bd->update($this->tabla, $city->get());
        $paramsWhere = array();
        $paramsWhere["idreserva"] = $reserva->getIdreserva();
        return $this->bd->update($this->tabla, $reserva->get(), $paramsWhere);
    }

    function insert(Reserva $reserva) {
        return $this->bd->insert($this->tabla, $reserva->get());
    }

    function delete($idreserva) {
        $parametros = array();
        $parametros['idreserva'] = $idreserva;
        return $this->bd->delete($this->tabla, $parametros);
    }

    function get($idreserva) {
        $parametros = array();
        $parametros['idreserva'] = $idreserva;
        $this->bd->select($this->tabla, '*', 'idreserva=:idreserva', $parametros);
        $fila = $this->bd->getRow();
        $reserva = new Reserva();
        $reserva->set($fila);
        return $reserva;
    }

    function getList($pagina = 1, $orden = "", $nrpp = Configuracion::NRPP, $condicion = "1=1", $parametros = array()) {
        $ordenPredeterminado = "$orden, fecha, hora";
        if (trim($orden) === "" || trim($orden) === NULL) {
            $ordenPredeterminado = "fecha";
        }
        $registroInicial = ($pagina - 1) * $nrpp;
        $this->bd->select($this->tabla, "*", $condicion, $parametros, $ordenPredeterminado, "$registroInicial, $nrpp");
        $r = array();
        while ($fila = $this->bd->getRow()) {
            $reserva = new Reserva();
            $reserva->set($fila);
            $r[] = $reserva;
        }
        return $r;
    }

    function paginacion() {
        $sql = "select count from $this->bd";
    }

    function count($condicion = "1=1", $parametros = array()) {
        return $this->bd->count($this->tabla, $condicion, $parametros);
    }

    function getValuesSelect() {
        $this->bd->query($this->tabla, "idreserva", array(), "fecha");
        $array = array();
        while ($fila = $this->bd->getRow()) {
            $array[$fila[0]] = $fila[1];
        }
        return $array;
    }
}
