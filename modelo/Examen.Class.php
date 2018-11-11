<?php

include_once 'BDObjetoGenerico.Class.php';
include_once 'Llamado.Class.php';

class Examen extends BDObjetoGenerico {


    private $llamados;

    function __construct($id = null) {
        parent::__construct($id, "MESA_EXAMEN");
    }

    function getId() {
        return $this->id;
    }
    function getOrden() {
        return $this->orden;
    }
    function setId($id) {
        $this->id = $id;
    }
    function setOrden($orden) {
        $this->orden = $orden;
    }
    
}
