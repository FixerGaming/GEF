<?php

include_once 'BDObjetoGenerico.Class.php';
include_once 'Asignatura.Class.php';


class Carrera extends BDObjetoGenerico {

    function __construct($id = null) {
        parent::__construct($id, "CARRERA");
    }

    function getId() {
        return $this->id;
    }
    function getNombre() {
        return $this->nombre;
    }

    function setId($id) {
        $this->id = $id;
    }
    function setNombre($nombre) {
        $this->nombre = $nombre;
    }
   
}
