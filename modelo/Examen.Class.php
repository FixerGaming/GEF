<?php

include_once 'BDObjetoGenerico.Class.php';
include_once 'Llamado.Class.php';

class Examen extends BDObjetoGenerico {


    /**
     *
     * @var Llamado[]
     */
    private $llamados;

    function __construct($id = null) {
        parent::__construct($id, "MESA_EXAMEN");
        $this->setLlamado("LLAMADO_MESA_EXAMEN", "LLAMADO", "idLlamado", "idMesa", "LLAMADO");
    }

    function getId() {
        return $this->id;
    }
    function getOrden() {
        return $this->orden;
    }
    function setId($id) {
        $this->id = $id;
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
    function setLlamado($tablaVinculacion, $tablaElementos, $idObjetoContenedor, $atributoFKElementoColeccion, $claseElementoColeccion) {
        $this->setColeccionElementos($tablaVinculacion, $tablaElementos, $idObjetoContenedor, $atributoFKElementoColeccion, $claseElementoColeccion);
        $this->llamados = $this->getColeccionElementos();
    }

    function getLlamado() {
        return $this->llamados;
    }

    /**
     * 
     * @param int $id
     * @return boolean
     */
    function buscarLlamadoMesa($id) {
        foreach ($this->getLlamado() as $LlamadoMesa) {
            if ($id == $LlamadoMesa->getId()) {
                return true;
            }
        }
        return false;
    }

}
