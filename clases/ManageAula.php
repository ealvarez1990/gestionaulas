<?php

class ManageAula {

    private $bd = NULL;
    private $tabla = 'aula';

    function __construct(BaseDatos $bd) {
        $this->bd = $bd;
    }

    function set(Aula $aula) {
        $paramsWhere = array();
        $paramsWhere["idaula"] = $aula->getIdaula();
        return $this->bd->update($this->tabla, $aula->get(), $paramsWhere);
    }

    function insert(Aula $aula) {
        return $this->bd->insert($this->tabla, $aula->get());
    }

    function delete($idaula) {
        $parametros = array();
        $parametros['idaula'] = $idaula;
        return $this->bd->delete($this->tabla, $parametros);
    }

    function get($idaula) {
        $parametros = array();
        $parametros['idaula'] = $idaula;
        $this->bd->select($this->tabla, '*', 'idaula=:idaula', $parametros);
        $fila = $this->bd->getRow();
        $aula = new Aula();
        $aula->set($fila);
        return $aula;
    }

    function getList($pagina = 1, $orden = "", $nrpp = Configuracion::NRPP, $condicion = "1=1", $parametros = array()) {
        $ordenPredeterminado = "$orden, nombreaula, idaula";
        if (trim($orden) === "" || trim($orden) === NULL) {
            $ordenPredeterminado = "idaula";
        }
        $registroInicial = ($pagina - 1) * $nrpp;
        $this->bd->select($this->tabla, "*", $condicion, $parametros, $ordenPredeterminado, "$registroInicial, $nrpp");
        $r = array();
        while ($fila = $this->bd->getRow()) {
            $aula = new Aula();
            $aula->set($fila);
            $r[] = $aula;
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
        $this->bd->query($this->tabla, "idaula ", array(), "nombreaula");
        $array = array();
        while ($fila = $this->bd->getRow()) {
            $array[$fila[0]] = $fila[1];
        }
        return $array;
    }
}
