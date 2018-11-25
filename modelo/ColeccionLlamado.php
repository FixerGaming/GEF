<?php
include_once 'BDColeccionGenerica.Class.php';
include_once 'Llamado.Class.php';

class ColeccionLlamado extends BDColeccionGenerica {

    /**
     *
     * @var Llamado[]
     */
    private $llamados;
   
    function __construct() {
        parent::__construct();
        $this->setColeccion("llamado","LLAMADO");
        $this->llamados = $this->coleccion;
    }
    
     /**
     * 
     * @return array()
     */
    function getLlamado() {
        return $this->llamados;
    }
}
