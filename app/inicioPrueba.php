<?php
include_once '../modelo/MesaExamen.Class.php';

 $MesaExamen= new MesaExamen();

 $fechas= array();

 array_push($fechas,12,13,14,15,16);

 $MesaExamen->setId($fechas);


 echo $MesaExamen->getId()[1];
?>
