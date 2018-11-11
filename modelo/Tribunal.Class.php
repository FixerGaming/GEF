<?php

include_once 'BDObjetoGenerico.Class.php';
include_once 'Docente.Class.php';
$Docente= new Docente();
class Tribunal extends BDObjetoGenerico {


    function __construct($id = null) {
        parent::__construct($id, "TRIBUNAL");
    }

   function getId(){
       return $this->id;
   }
   function getPresidente(){
       return $this->presidente;
   }
   function getVocal1(){
    return $this->vocal;
    }
    function getVocal2(){
        return $this->vocal1;
    }
    function getSuplente(){
        return $this->suplente;
    }


    function setId($id){
        $this->id = $id;
    }
    function setPresidente($presidente){
        $this->presidente = $presidente;
    }
    function setVocal1($vocal){
        $this->vocal = $vocal;
    }
    function setVocal2($vocal1){
        $this->vocal1 = $vocal1;
    }
    function setSuplente($suplente){
        $this->suplente = $suplente;
    }
   

}
