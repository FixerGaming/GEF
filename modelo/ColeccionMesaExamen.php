<?php
include_once 'BDColeccionGenerica.Class.php';
include_once 'MesaExamen.Class.php';

class ColeccionMesaExamen extends BDColeccionGenerica{

    /**
     *
     * @var MesaExamen[]
     */
    private $usuarios;

    function __construct() {
        parent::__construct();
        $this->setColeccion("mesa_examen","MesaExamen");
        $this->mesaexamenes = $this->coleccion;
    }

     /**
     *
     * @return array()
     */
    function getMesas() {
        return $this->mesaexamenes;
    }
}
