<?php

include_once 'BDObjetoGenerico.Class.php';
include_once 'Rol.Class.php';

class Cargo extends BDObjetoGenerico {

    protected $email;

    /**
     *
     * @var Rol[]
     */
    private $roles;

    function __construct($id = null) {
        parent::__construct($id, "cargo");
    }


    function gettipoDedicacion() {
        return $this->tipoDedicacion;
    }
    function gettipoCargo() {
        return $this->tipoCargo;
    }
    function getId() {
        return $this->id;
    }
    function getidProfesorcarg() {
        return $this->idProfesorcarg;
    }

    function setId($id) {
        $this->id = $id;
    }
    function setidProfesorcarg($idProfesorcarg) {
        $this->idProfesorcarg = $idProfesorcarg;
    }
    function settipoDedicacion($tipoDedicacion) {
        $this->tipoDedicacion = $tipoDedicacion;
    }
    function settipoCargo($tipoCargo) {
        $this->tipoCargo = $tipoCargo;
    }
    function setdepartamento($departamento) {
        $this->departamento = $departamento;
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
