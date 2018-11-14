<?php

include_once 'BDObjetoGenerico.Class.php';
include_once 'Examen.Class.php';

class Llamado extends BDObjetoGenerico {


    /**
     *
     * @var Examen[]
     */
    private $examen;

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
    function setId($id) {
        $this->id = $id;
    }
    function setTipo($tipo) {
        $this->tipo = $tipo;
    }
    function setNombre($nombre) {
        $this->nombre = $nombre;
    }


}