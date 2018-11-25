<?php

include_once 'BDObjetoGenerico.Class.php';
include_once 'Llamado.Class.php';
class Examen extends BDObjetoGenerico {



    function __construct($id = null) {
        parent::__construct($id, "FECHA");
        $Llamado = new Llamado();
    }

    function getId() {
        return $this->id;
    }
    function getOrden() {
        return $this->orden;
    }
    function getFecha1() {
        return $this->fecha1;
    }
    function getfecha2() {
        return $this->fecha2;
    }
    function getLlamado() {
        return $this->Llamado;
    }
    function setId($id) {
        $this->id = $id;
    }
    function setOrden($orden) {
        $this->orden = $orden;
    }
    function setFecha1($fecha1) {
        $this->fecha1 = $fecha1;
    }
    function setFecha2($fecha2) {
        $this->fecha2 = $fecha2;
    }
    function setLlaamado($Llamado) {
        $this->Llamado = $Llamado;
    }
}
