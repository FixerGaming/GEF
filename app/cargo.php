<?php
include_once '../modelo/BDConexion.Class.php';
  class cargo{
   public $tipodedicacion;
   public $tipocargo;
   public $departamento;
   public $id;
   public $idprofesorcargo;


   public function __construct($id = '',$tipodedi,$tipocar,$dep,$idprofesor)
   {
       $this->$tipodedicacion = $tipodedi;
       $this->$tipocargo = $tipocar;
       $this->$departamento = $dep;
       $this->$idprofesor = $idprofesorcargo;
   }

  function insertar()
  {
    $cargoinsertar="INSERT INTO `cargo`(`tipoDedicacion`, `tipoCargo`, `departamento`, `idProfesorcarg`) VALUES
    ($this->$tipodedicacion,$this->$tipocargo,$this->$departamento,$this->$idprofesor)";
    $cargoin=BDConexion::getInstancia()->query($cargoinsertar);

  }

  }
 ?>
