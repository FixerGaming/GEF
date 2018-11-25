<?php
include_once 'BDColeccionGenerica.Class.php';
include_once 'Licencia.Class.php';

class ColeccionLicencia extends BDColeccionGenerica{

    /**
     *
     * @var Licencia[]
     */
    private $usuarios;

    function __construct() {
        parent::__construct();
        $this->setColeccion("licencia","Licencia");
        $this->licencias = $this->coleccion;
    }

     /**
     *
     * @return array()
     */
    function getLicencias() {
        return $this->licencias;
    }
    /**
    *
    * @return array()
    */
    function getLicenciaspordocentes($nombre){
       return $this->licencias;
    }



}
