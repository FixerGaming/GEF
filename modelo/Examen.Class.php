<?php

include_once 'BDObjetoGenerico.Class.php';

class Examen extends BDObjetoGenerico {



    function __construct($id = null) {
        parent::__construct($id, "MESA_EXAMEN");
    }

    function getId() {
        return $this->id;
    }
    function getOrden() {
        return $this->orden;
    }
    function getTribunal() {
        return $this->tribunal;
    }
    function getAsignatura() {
        return $this->asignatura;
    }
    function getCarreras(){
        return $this->carreras;
    }


    function setId($id) {
        $this->id = $id;
    }
    function setOrden($orden) {
        $this->orden = $orden;
    }
    function setTribunal($Tribunal) {
        $this->tribunal = $Tribunal;
    }
    function setAsignatura($Asignatura) {
        $this->asignatura = $Asignatura;
    }
    function setCarreras($Carreras){
        $this->carreras = $Carreras;
    }
    
}
