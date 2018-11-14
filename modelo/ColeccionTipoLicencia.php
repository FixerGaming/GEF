<?php
include_once 'BDColeccionGenerica.Class.php';
include_once 'TipoLicencia.Class.php';

class ColeccionTipoLicencia extends BDColeccionGenerica{

    /**
     *
     * @var TipoLicencia[]
     */
    private $usuarios;

    function __construct() {
        parent::__construct();
        $this->setColeccion("tipo_licencia","TipoLicencia");
        $this->tipolicencias = $this->coleccion;
    }

     /**
     *
     * @return array()
     */
    function getTipoLicencias() {
        return $this->tipolicencias;
    }
}
