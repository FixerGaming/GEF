<?php

include_once 'BDObjetoGenerico.Class.php';
include_once 'Examen.Class.php';

class Llamado extends BDObjetoGenerico {


    /**
     *
     * @var Examen[]
     */
    private $examen;

    function __construct($id = null) {
        parent::__construct($id, "LLAMADO");
        $this->setExamen("LLAMADO_MESA_EXAMEN","MESA_EXAMEN", "idLlamado", "idMesa", "Examen");
    }

    function getId() {
        return $this->id;
    }
    function getTipo() {
        return $this->tipo;
    }
    function getNombre() {
        return $this->nombre;
    }
    function setId($id) {
        $this->id = $id;
    }
    function setTipo($tipo) {
        $this->tipo = $tipo;
    }
    function setNombre($nombre) {
        $this->nombre = $nombre;
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
    function setExamen($tablaVinculacion, $tablaElementos, $idObjetoContenedor, $atributoFKElementoColeccion, $claseElementoColeccion) {
        $this->setColeccionElementos($tablaVinculacion, $tablaElementos, $idObjetoContenedor, $atributoFKElementoColeccion, $claseElementoColeccion);
        $this->examen = $this->getColeccionElementos();
    }

    function getExamen() {
        return $this->examen;
    }

    /**
     * 
     * @param int $id
     * @return boolean
     */
    function buscarMesaporId($id) {
        foreach ($this->getExamen() as $MesaLlamado) {
            if ($id == $MesaLlamado->getId()) {
                return true;
            }
        }
        return false;
    }

}
