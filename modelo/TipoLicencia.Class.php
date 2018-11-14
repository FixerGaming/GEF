<?php

include_once 'BDObjetoGenerico.Class.php';
include_once 'Rol.Class.php';

class TipoLicencia extends BDObjetoGenerico {

    protected $email;

    /**
     *
     * @var Rol[]
     */
    private $roles;

    function __construct($id = null) {
        parent::__construct($id, "tipo_licencia");
    }

    function getId() {
        return $this->id;
    }
    function getNombre() {
        return $this->nombre;
    }
    function getDescripcion() {
        return $this->descripcion;
    }
    function getIdLicencia() {
        return $this->idLicencia;
    }

    function setId($id) {
        $this->id = $id;
    }
    function setNombre($nombre) {
        $this->fechaInicio = $fechaInicio;
    }
    function setDescripcion($descripcion) {
        $this->fechaFinal = $fechaFinal;
    }
    function setidLicencia($idLicencia) {
        $this->idLicencia = $idLicencia;
    }


    /**
     *
     * @param type $tablaVinculacion
     * @param type $tablaElementos
     * @param type $idObjetoContenedor
     * @param type $atributoFKElementoColeccion
     * @param type $claseElementoColeccion
     *
     */
    function setRoles($tablaVinculacion, $tablaElementos, $idObjetoContenedor, $atributoFKElementoColeccion, $claseElementoColeccion) {
        $this->setColeccionElementos($tablaVinculacion, $tablaElementos, $idObjetoContenedor, $atributoFKElementoColeccion, $claseElementoColeccion);
        $this->roles = $this->getColeccionElementos();
    }

    function getRoles() {
        return $this->roles;
    }

    /**
     *
     * @param int $id
     * @return boolean
     */
    function buscarRolPorId($id) {
        foreach ($this->getRoles() as $RolUsuario) {
            if ($id == $RolUsuario->getId()) {
                return true;
            }
        }
        return false;
    }

}
