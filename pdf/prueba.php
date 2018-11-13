
<!DOCTYPE html>
<html lang="en" >

<head>
  <meta charset="UTF-8">
  <title>Bootstrap Multi Select Date Picker</title>
  
  
  <link rel='stylesheet' href='http://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/css/bootstrap.min.css'>

      <link rel="stylesheet" href="../lib/calendar/style.css">

<?php 
include_once '../modelo/BDConexion.Class.php';
  $cont=0;
  $fechas= array();

  @$Fecha =$_POST['fecha'];

  
  while(strlen(strstr($Fecha,','))){
  $fecha1= strstr($Fecha, ',', true);
  $Fecha= substr(strstr($Fecha,',').' ',1,-1);
  $cont++; 
    array_push($fechas,$fecha1);
 

  }
  array_push($fechas,$Fecha);
  echo $cont;

  if($cont==9){
    for($i=0; $i<5; $i++){
      echo $fechas[$i + 5];
      $INSERT="INSERT INTO FECHA ( orden, fecha1, fecha2, LLAMADO_id) VALUES(".($i+1).",'".$fechas[$i]."','".$fechas[$i + 5]."',1)";
        BDConexion::getInstancia()->query($INSERT);

    }
  }

  if($cont > 0 && $cont < 6 ){
    for($i=0; $i<=$cont; $i++){
      $fecha1=$fechas[$i];
      $INSERTE="INSERT INTO FECHA ( orden, fecha1, fecha2, LLAMADO_id) VALUES(".($i+1).",'".$fecha1."',NULL,1)";
      BDConexion::getInstancia()->query($INSERTE);
   
    }
  }
?>
  
</head>

<body>

    <form action="prueba.php" method="POST">
  <div class="container">
	<h3>Bootstrap Multi Select Date Picker</h3>
	<input type="text" name="fecha" class="form-control date" placeholder="Pick the multiple dates">
</div>
  <script src='http://cdnjs.cloudflare.com/ajax/libs/jquery/2.1.3/jquery.min.js'></script>
<script src='https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.3.0/js/bootstrap-datepicker.js'></script>
  <input type="submit"  value="ingresar">
</form>
    <script  src="../lib/calendar/script.js"></script>




</body>

</html>
    