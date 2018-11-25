<?php
include_once 'BDColeccionGenerica.Class.php';
include_once 'Tribunal.Class.php';

class ColeccionTribunal extends BDColeccionGenerica{

    /**
     *
     * @var Tribunal[]
     */
    private $usuarios;

    function __construct() {
        parent::__construct();
        $this->setColeccion("tribunal","Tribunal");
        $this->tribunales = $this->coleccion;
    }

     /**
     *
     * @return array()
     */
    function getTribunales() {
        return $this->tribunales;
    }
}
