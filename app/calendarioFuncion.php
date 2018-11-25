<?php 
  include_once '../modelo/BDConexion.Class.php';
  include_once '../modelo/Llamado.Class.php';

    @$MesaExamen= $_POST['Mesa'];
    //Consulta a la Base de Datos para recuperar el ID, Tipo y nombre del LLAMADO
    $Consulta="SELECT L.id AS identifica, L.tipo AS tipo, L.nombre AS nombre FROM LLAMADO L WHERE L.id LIKE '%".$MesaExamen."%'";
    $Consultas=BDConexion::getInstancia()->query($Consulta);
    $row = $Consultas->fetch_assoc();
    $Llamado = new Llamado($row['identifica']);
    $Llamado->setTipo($row['tipo']);
    $Llamado->setId($row['identifica']);
    $Llamado->setNombre($row['nombre']);
  
    //Utilizacion de sessiones para mandar el id del llamado seleccionado
    session_start();
    $_SESSION['llamado']=$Llamado->getId();
    header("Location:examenBuscar.php");
    header("Location:gestionExamen.php");

    //Si se aprieta el Boton "Calendario" se recarga la pagina y cuando llega al if si esta apretado entra, en el caso deque no lo salta y no se realiza ninguna operacion
    if(isset($_POST['calendario'])){
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

        if($cont== 9 && $Llamado->getTipo() == "general"){  
            for($i=0; $i<5; $i++){
                $INSERT="INSERT INTO FECHA (orden, fecha1, fecha2, LLAMADO_id) VALUES(".($i+1).",'".$fechas[$i]."','".$fechas[$i + 5]."',".$Llamado->getId().")";
                BDConexion::getInstancia()->query($INSERT);
        ?>
        <?php
            }
        }else{
            if($cont > 0 && $cont <5 && $Llamado->getTipo()!="general"){
                for($i=0; $i<=$cont; $i++){
                $fecha1=$fechas[$i];
                $INSERTE="INSERT INTO FECHA (orden, fecha1, fecha2, LLAMADO_id) VALUES(".($i+1).",'".$fecha1."',NULL,".$Llamado->getId().")";
                BDConexion::getInstancia()->query($INSERTE); 
        ?>
        <?php
                }
            }
            
        ?>
        <?php
        }
    }

?>
