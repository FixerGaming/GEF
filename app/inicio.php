<?php
include_once '../lib/ControlAcceso.Class.php';
ControlAcceso::requierePermiso(PermisosSistema::PERMISO_USUARIOS);
include_once '../modelo/ColeccionLlamado.php';
include_once '../modelo/BDConexion.Class.php';

$ColeccionLlamado = new ColeccionLlamado();
?>

<html>
    <head>
        <meta charset="UTF-8">
        <link rel="stylesheet" href="../lib/bootstrap-4.1.1-dist/css/bootstrap.css" />
        <link rel="stylesheet" href="../lib/open-iconic-master/font/css/open-iconic-bootstrap.css" />
        <script type="text/javascript" src="../lib/JQuery/jquery-3.3.1.js"></script>
        <script type="text/javascript" src="../lib/bootstrap-4.1.1-dist/js/bootstrap.min.js"></script>
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
        <script src="https://cdn.jsdelivr.net/npm/gijgo@1.9.10/js/gijgo.min.js" type="text/javascript"></script>
        <link href="https://cdn.jsdelivr.net/npm/gijgo@1.9.10/css/gijgo.min.css" rel="stylesheet" type="text/css" />
        <link rel="stylesheet" href="../lib/calendar/style.css">

         
        <title><?= Constantes::NOMBRE_SISTEMA; ?> - Inicio</title>
    </head>
    <body>

        <?php include_once '../gui/navbar.php'; ?>
<div class="container-fluid "> 
    <div class="container">
    <div class="row justify-content-around">
          <div class=" col-sm-3">
                <div class="card">
                    <div class="card-header alert-info">
                    <?php @$NombreMesa = $_POST['NombreMesa'];
                        $Consulta="SELECT L.tipo AS tipo, L.id AS id, L.nombre AS nombre FROM LLAMADO L WHERE L.id LIKE '%".$NombreMesa."%'";
                        $Consultas=BDConexion::getInstancia()->query($Consulta);
                        $row = $Consultas->fetch_assoc();
                        $tipo=$row['tipo'];
                        $id=$row['id'];
                        $nombre=$row['nombre'];
                    ?>
                        <form action="inicio.php" method="POST" name="formulario">
                            <select class="form-control" name="NombreMesa" >
                                <?php foreach ($ColeccionLlamado->getLlamado() as $Llamado) {?>
                                    <option value="<?php echo $Llamado->getId();?>" <?php if($Llamado->getId()==$NombreMesa) { echo 'selected';} ?> > <?php echo $Llamado->getNombre();?></option>
                                <?php }   ?>
                            </select>
                    </div> 
                        <input type="submit" name="reporte"  value="Ingresar" id="">
                        </form>
                </div>
            </div> 
        <?php
            /*foreach($ColeccionLlamado->getLlamado() as $Llamado){
                $llam= $Llamado->getId().'a';
                if(strlen(strstr(strtolower($llam),strtolower($NombreMesa.'')))> 0){
                $NombreM = $Llamado->getNombre(); $NombreTipo = $Llamado->getTipo();
                echo '<script type="text/javascript">alert("dasdas");</script>';
                }
            }*/
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
              
              if($cont==9 && $tipo== "general"){
                for($i=0; $i<5; $i++){
                  $INSERT="INSERT INTO FECHA ( orden, fecha1, fecha2, LLAMADO_id) VALUES(".($i+1).",'".$fechas[$i]."','".$fechas[$i + 5]."',".$id.")";
                    BDConexion::getInstancia()->query($INSERT);
            ?>
                <div style="display:none">
                <form action="gestionExamen.php" id="POST" method="POST">
                    <input type="text" name="identificador" value=<?php echo $id; ?>>
                    <input type="text" name="Buscar" value="1">
                </form>
                </div>
                <script >document.getElementById("POST").submit();</script>
            <?php
                }
              }else{
                if($cont > 0 && $cont < 6){
                      for($i=0; $i<=$cont; $i++){
                      $fecha1=$fechas[$i];
                      $INSERTE="INSERT INTO FECHA ( orden, fecha1, fecha2, LLAMADO_id) VALUES(".($i+1).",'".$fecha1."',NULL,".$id.")";
                      BDConexion::getInstancia()->query($INSERTE); 
            ?>
                <script >setTimeout("location.href='gestionExamen.php'",0);</script>
            <?php
                    }
                  }
              }
            

        ?>
        <?php 
        if(isset($_POST['reporte'])){ ?>
        
        <form action="inicio.php" method="POST">
                <div class="container">
                	<h3><?php echo $nombre; ?></h3>
	                    <input type="text"  name="fecha" class="form-control date" placeholder="Pick the multiple dates"  >
                        <input type="submit" name="insertar" class="btn btn-primary btn-block btn-lg"/>
                </div>
        </form>
    <?php } ?>                        
    </div>
    </div>
</div>
        <?php include_once '../gui/footer.php'; ?>
        <script src='http://cdnjs.cloudflare.com/ajax/libs/jquery/2.1.3/jquery.min.js'></script>
        <script src='https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.3.0/js/bootstrap-datepicker.js'></script>
        <script  src="../lib/calendar/script.js"></script>
    </body>
</html>

