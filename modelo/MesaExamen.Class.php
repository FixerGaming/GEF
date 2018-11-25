<?php

include_once 'BDObjetoGenerico.Class.php';
include_once 'Rol.Class.php';

class MesaExamen extends BDObjetoGenerico {

    protected $email;

    /**
     *
     * @var Rol[]
     */
    private $roles;

    function __construct($id = null) {
        parent::__construct($id, "mesa_examen");
    }

    function getId() {
        return $this->id;
    }

    function getIdtribunal() {
        return $this->idTribunal;
    }
    function getIdAsignatura() {
        return $this->codAsignatura;
    }
    function getOrden() {
        return $this->orden;
    }



    function setId($id) {
        $this->id = $id;
    }
    function setIdtribunal($idTribunal) {
        $this->idTribunal = $idTribunal;
    }
    function setAsignatura($codAsignatura) {
        $this->codAsignatura = $codAsignatura;
    }
    function setOrden($orden) {
        $this->orden = $orden;
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
