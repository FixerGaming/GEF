<<?php

include_once '../modelo/BDConexion.Class.php';
 $n=$_POST['nombre'];
 $a=$_POST['apellido'];
 $d=$_POST['dni'];
 $e=$_POST['email'];
 $c=$_POST['cargo'];
 $d=$_POST['dedicacion'];
 $ca=$_POST['categoria'];
 $dep=$_POST['departamento'];

 $profesoreditar="UPDATE INTO bdusuarios.profesor (nombre,apellido,email,categoria) VALUES ('$n','$a','$e','$ca' ) Where dni='$d'";
 echo $profesores=BDConexion::getInstancia()->query($profesoreditar);



 ?>
