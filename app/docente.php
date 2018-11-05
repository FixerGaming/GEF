<?php
include_once '../modelo/BDConexion.Class.php';
   class docente{
   public $id;
   public $nombre;
   public $dni;
   public $apellido;
   public $email;
   public $categoria;

   public function docente($id = '',$nom,$doc,$apel,$eml,$cat)
   {
       $this->$nombre = $nom;
       $this->$dni = $doc;
       $this->$apellido = $apel;
       $this->$email = $eml;
       $this->$categoria = $cat;
   }

  function insertardocente()
  {
    $profesorinsertar="INSERT INTO `profesor`(`dni`, `nombre`, `apellido`, `email`, `categoria`)VALUES ($this->$dni,$this->nombre,$this->$apellido,$this->$email,$this->$categoria)";
    $profesoresin=BDConexion::getInstancia()->query($profesorinsertar) ? alertify.success("Se agrego docente satisfactoriamente") : alertify.error("Fallo al insertar docente");;

  }

  }

 ?>
