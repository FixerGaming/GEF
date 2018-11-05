<?php
include_once 'BDColeccionGenerica.Class.php';
include_once 'Docente.Class.php';

class ColeccionDocentes extends BDColeccionGenerica{

    /**
     *
     * @var Docente[]
     */
    private $usuarios;

    function __construct() {
        parent::__construct();
        $this->setColeccion("PROFESOR","Docente");
        $this->docentes = $this->coleccion;
    }

     /**
     *
     * @return array()
     */
    function getDocentes() {
        return $this->docentes;
    }
}
