<?php

include_once 'BDObjetoGenerico.Class.php';
include_once 'Rol.Class.php';

class Docente extends BDObjetoGenerico {

    protected $email;

    /**
     *
     * @var Rol[]
     */
    private $roles;

    function __construct($id = null) {
        parent::__construct($id, "PROFESOR");
    }

    function getId() {
        return $this->id;
    }
    function getDni() {
        return $this->dni;
    }
    function getNombre() {
        return $this->nombre;
    }
    function getApellido() {
        return $this->apellido;
    }
    function getEmail() {
        return $this->email;
    }
    function getCargo() {
        return $this->cargo;
    }
    function getCategoria() {
        return $this->categoria;
    }
    function getIdDepartamento() {
        return $this->idDepartamento;
    }

    function setId($id) {
        $this->id = $id;
    }
    function setDni($dni) {
        $this->dni = $dni;
    }
    function setNombre($nombre) {
        $this->nombre = $nombre;
    }
    function setApellido($apellido) {
        $this->apellido = $apellido;
    }
    function setEmail($email) {
        $this->email = $email;
    }
    function setCargo($cargo) {
        $this->cargo = $cargo;
    }
    function setCategoria($categoria) {
        $this->categoria = $categoria;
    }
    function setIdDepartamento($idDepartamento) {
        $this->idDepartamento = $idDepartamento;
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
