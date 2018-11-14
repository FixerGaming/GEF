<?php
include_once 'BDColeccionGenerica.Class.php';
include_once 'Cargo.Class.php';

class ColeccionCargo extends BDColeccionGenerica{

    /**
     *
     * @var Cargo[]
     */
    private $usuarios;

    function __construct() {
        parent::__construct();
        $this->setColeccion("cargo","Cargo");
        $this->cargos = $this->coleccion;
    }

     /**
     *
     * @return array()
     */
    function getCargos() {
        return $this->cargos;
    }
}
