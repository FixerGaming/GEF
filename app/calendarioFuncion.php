<?php 
  include_once '../modelo/BDConexion.Class.php';
  
    @$MesaExamen= $_POST['Mesa'];
    //Consulta a la Base de Datos para recuperar el ID, Tipo y nombre del LLAMADO
    $Consulta="SELECT L.id AS identifica, L.tipo AS tipo, L.nombre AS nombre FROM LLAMADO L WHERE L.id LIKE '%".$MesaExamen."%'";
    $Consultas=BDConexion::getInstancia()->query($Consulta);
    $row = $Consultas->fetch_assoc();
    $tipo=$row['tipo'];
    $identificador=$row['identifica'];
    $nombre=$row['nombre'];
  
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

        if($cont== 9 && $tipo == "general"){  
            for($i=0; $i<5; $i++){
                $INSERT="INSERT INTO FECHA (orden, fecha1, fecha2, LLAMADO_id) VALUES(".($i+1).",'".$fechas[$i]."','".$fechas[$i + 5]."',".$identificador.")";
                BDConexion::getInstancia()->query($INSERT);
        ?>
                <div style="display:none">
                        <form action="gestionExamen.php" id="POST" method="POST">
                            <input type="text" name="identificador" value=<?php echo $identificador;?>>
                            <input type="text" name="tipo" value=<?php echo $tipo;?>>
                            <input type="text" name="Buscar" value="1">
                        </form>
                    </div>
                <script >document.getElementById("POST").submit();</script>
        <?php
            }
        }else{
            if($cont > 0 && $cont <5 && $tipo!="general"){
                for($i=0; $i<=$cont; $i++){
                $fecha1=$fechas[$i];
                $INSERTE="INSERT INTO FECHA (orden, fecha1, fecha2, LLAMADO_id) VALUES(".($i+1).",'".$fecha1."',NULL,".$identificador.")";
                BDConexion::getInstancia()->query($INSERTE); 
        ?>
                <div style="display:none">
                        <form action="gestionExamen.php" id="POST" method="POST">
                            <input type="text" name="identificador" value=<?php echo $identificador;?>>
                            <input type="text" name="tipo" value=<?php echo $tipo;?>>
                            <input type="text" name="Buscar" value="1">
                        </form>
                    </div>
                <script >document.getElementById("POST").submit();</script>
        <?php
                }
            }
            echo '<script type="text/javascript">alert("Error");</script>';
            
        ?>
        <?php
        }
    }

?>
