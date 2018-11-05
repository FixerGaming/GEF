<?php
include_once '../modelo/BDConexion.Class.php';
include 'docente.php';

function insertardocente($docente)
{
  $profesorinsertar="INSERT INTO `profesor`(`dni`, `nombre`, `apellido`, `email`, `categoria`)VALUES ($this->$dni,$this->nombre,$this->$apellido,$this->$email,$this->$categoria)";
  $profesoresin=BDConexion::getInstancia()->query($profesorinsertar) ? alertify.success("Se agrego docente satisfactoriamente") : alertify.error("Fallo al insertar docente");;

}







?>
