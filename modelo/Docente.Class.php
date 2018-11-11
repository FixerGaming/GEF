<?php

include_once 'BDObjetoGenerico.Class.php';

class Docente extends BDObjetoGenerico {

    protected $email;


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


}
