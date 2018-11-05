<?php
include_once 'BDColeccionGenerica.Class.php';
include_once 'Carrera.Class.php';

class ColeccionCarrera extends BDColeccionGenerica {
    
    private $asignatura;
   
    function __construct() {
        parent::__construct();
        $this->setColeccion("ASIGNATURA","Asignatura");
        $this->asignatura = $this->coleccion;
    }
    
    /**
     * 
     * @return array()
     */
    function getAsignatura() {
        return $this->asignatura;
    }


}