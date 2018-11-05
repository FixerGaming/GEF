<?php
include_once '../modelo/BDConexion.Class.php';
 $n=$_POST['carrera'];
 $a=$_POST['asignatura'];
 $d=$_POST['presidente'];
 $e=$_POST['vocal'];
 $c=$_POST['vocal1'];
 $d=$_POST['suplente'];
 $ca=$_POST['llamado1'];
 $dep=$_POST['llamado2'];
 $h=$_POST['hora'];
 $profesoragregar="INSERT INTO bdUsuarios.MESA_EXAMEN (tipo,idTribunal,codAsignatura) VALUES ('6','$n','$a','$e','$ca' )";
 echo $profesores=BDConexion::getInstancia()->query($profesoragregar);
?>
