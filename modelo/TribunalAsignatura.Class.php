<?php

include_once 'BDObjetoGenerico.Class.php';

class TribunalAsignatura extends BDObjetoGenerico {


    function __construct($id = null) {
        parent::__construct($id, "tribunalasignaturas");
    }

    function getId() {
        return $this->idTribunalAsignatura;
    }
    function getTribunalid() {
        return $this->TRIBUNAL_id;
    }
    function getAsignaturaid() {
        return $this->ASIGNATURA_id;
    }

    function setId($idTribunalAsignatura) {
        $this->idTribunalAsignatura = $idTribunalAsignatura;
    }
    function setTribunalid($TRIBUNAL_id) {
        $this->TRIBUNAL_id = $TRIBUNAL_id;
    }
    function setAsignaturaid($ASIGNATURA_id) {
        $this->ASIGNATURA_id = $ASIGNATURA_id;
    }

}
