<?php
include_once 'BDColeccionGenerica.Class.php';
include_once 'Asignatura.Class.php';

class ColeccionAsignaturas extends BDColeccionGenerica{

    /**
     *
     * @var Asignatura[]
     */
    private $usuarios;

    function __construct() {
        parent::__construct();
        $this->setColeccion("asignatura","Asignatura");
        $this->asignaturas = $this->coleccion;
    }

     /**
     *
     * @return array()
     */
    function getAsignaturas() {
        return $this->asignaturas;
    }
}
