<?php
include_once '../modelo/BDConexion.Class.php';
 $d=$_POST['dni'];
 $n=$_POST['nombre'];
 $a=$_POST['apellido'];
 
 $e=$_POST['email'];
 $c=$_POST['cargo'];
 $dedi=$_POST['dedicacion'];
 $ca=$_POST['categoria'];
 $dep=$_POST['departamento'];
 $cargoagregar="INSERT INTO bdusuarios.cargo (tipoDedicacion,tipoCargo,departamento,idProfesorcarg) VALUES ('$dedi','$c',$dep,'25')";
 $cargooo=BDConexion::getInstancia()->query($cargoagregar);
 $profesoragregar="INSERT INTO bdusuarios.profesor (nombre,apellido) VALUES ('$n','$a')";
 echo $profesores=BDConexion::getInstancia()->query($profesoragregar);

?>
<script>  console.log($d); </script>
