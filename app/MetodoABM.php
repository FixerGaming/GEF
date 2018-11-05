<?php
include_once '../modelo/BDConexion.Class.php';
class metodos
{

 public function mostrardatos($sql){

   BDConexion::getInstancia()->query($sql);
   return mysqli_fetch_all($result, $resulttype=MYSQLI_ASSOC);
 }

}


 ?>
