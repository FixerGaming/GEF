<?php

include_once 'BDObjetoGenerico.Class.php';
include_once 'Carrera.Class.php';


class Asignatura extends BDObjetoGenerico {

    function __construct($id = null) {
        parent::__construct($id, "ASIGNATURA");
    }

    function getId() {
        return $this->id;
    }
    function getNombre() {
        return $this->nombre;
    }
    function getDepartamento(){
        return $this->departamento;
    }
    function getProfesor(){
        return $this->$Profesor;
    }

    function setId($id) {
        $this->id = $id;
    }
    function setNombre($nombre) {
        $this->nombre = $nombre;
    }
    function setDepartamento($departamento){
        $this->departamento=$departamento;
    }

    function setProfesor($Profesor){
        $this->Profesor= $Profesor;
    }
}
