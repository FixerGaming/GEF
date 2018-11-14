<?php
include_once 'BDColeccionGenerica.Class.php';
include_once 'Departamento.Class.php';

class ColeccionDepartamento extends BDColeccionGenerica{

    /**
     *
     * @var Departamento[]
     */
    private $usuarios;

    function __construct() {
        parent::__construct();
        $this->setColeccion("departamento","Departamento");
        $this->departamentos = $this->coleccion;
    }

     /**
     *
     * @return array()
     */
    function getDepartamentos() {
        return $this->departamentos;
    }
}
