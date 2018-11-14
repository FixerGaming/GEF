<?php

include_once 'BDObjetoGenerico.Class.php';
include_once 'Rol.Class.php';

class Licencia extends BDObjetoGenerico {

    protected $email;

    /**
     *
     * @var Rol[]
     */
    private $roles;

    function __construct($id = null) {
        parent::__construct($id, "Licencia");
    }

    function getId() {
        return $this->id;
    }
    function getFechaInicio() {
        return $this->fechaInicio;
    }
    function getFechaFinal() {
        return $this->fechaFinal;
    }
    function getIdProfesor() {
        return $this->idProfesor;
    }

    function setId($id) {
        $this->id = $id;
    }
    function setFechaInicio($fechaInicio) {
        $this->fechaInicio = $fechaInicio;
    }
    function setFechaFinal($fechaFinal) {
        $this->fechaFinal = $fechaFinal;
    }
    function setApellido($idProfesor) {
        $this->idProfesor = $idProfesor;
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
