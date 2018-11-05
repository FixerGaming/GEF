<?php
include_once 'BDColeccionGenerica.Class.php';
include_once 'Carrera.Class.php';

class ColeccionCarrera extends BDColeccionGenerica {
    
    /**
     *
     * @var Carrera[]
     */
    private $carreras;
   
    function __construct() {
        parent::__construct();
        $this->setColeccion("CARRERA","Carrera");
        $this->carrera = $this->coleccion;
    }
    
    /**
     * 
     * @return array()
     */
    function getCarrera() {
        return $this->carrera;
    }


}