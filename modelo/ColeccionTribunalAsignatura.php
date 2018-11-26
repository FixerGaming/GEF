<?php
include_once 'BDColeccionGenerica.Class.php';
include_once 'TribunalAsignatura.Class.php';

class ColeccionTribunalAsignatura extends BDColeccionGenerica{

    /**
     *
     * @var TribunalAsignatura[]
     */
    private $usuarios;

    function __construct() {
        parent::__construct();
        $this->setColeccion("tribunalasignaturas","TribunalAsignatura");
        $this->tribunalasignaturas = $this->coleccion;
    }

     /**
     *
     * @return array()
     */
    function getTribunalesAsignaturas() {
        return $this->tribunalasignaturas;
    }
}
