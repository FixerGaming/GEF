<?php

include_once 'BDObjetoGenerico.Class.php';
include_once 'Rol.Class.php';

class Tribunal extends BDObjetoGenerico {

    protected $email;

    /**
     *
     * @var Rol[]
     */
    private $roles;

    function __construct($id = null) {
        parent::__construct($id, "tribunal");
    }

    function getId() {
        return $this->id;
    }
    function getPresidente() {
        return $this->presidente;
    }
    function getVocal() {
        return $this->vocal;
    }
    function getVocal1() {
        return $this->vocal1;
    }
    function getSuplente() {
        return $this->suplente;
    }

    function setId($id) {
        $this->id = $id;
    }
    function setPresidente($presidente) {
        $this->presidente = $presidente;
    }
    function setVocal($vocal) {
        $this->vocal = $vocal;
    }
    function setVocal1($vocal1) {
        $this->vocal1 = $vocal1;
    }
    function setSuplente($suplente) {
        $this->suplente = $suplente;
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
