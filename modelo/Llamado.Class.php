<?php

include_once 'BDObjetoGenerico.Class.php';

class Llamado extends BDObjetoGenerico {



    function __construct($id = null) {
        parent::__construct($id, "LLAMADO");
    }

    function getId() {
        return $this->id;
    }
    function getTipo() {
        return $this->tipo;
    }
    function getNombre() {
        return $this->nombre;
    }
    function getHora(){
        return $this->hora;
    }
    function getFechaUnica(){
        return $this->fechaunica;
    }
    function getMesas(){
        return $this->mesas;
    }


    function setId($id) {
        $this->id = $id;
    }
    function setTipo($tipo) {
        $this->tipo = $tipo;
    }
    function setNombre($nombre) {
        $this->nombre = $nombre;
    }
    function setHora($hora) {
        $this->hora = $hora;
    }
    function setFechaUnica($fechaUnica) {
        $this->fechaunica = $fechaUnica;
    }
    function setMesa($Mesas){
        $this->mesas= $Mesas;
    }
}