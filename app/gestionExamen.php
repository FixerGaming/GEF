<?php
include_once '../lib/ControlAcceso.Class.php';
ControlAcceso::requierePermiso(PermisosSistema::PERMISO_USUARIOS);
include_once '../modelo/ColeccionCarrera.php';
$ColeccionCarrera = new ColeccionCarrera();
include_once '../modelo/Llamado.Class.php';

?>

<html>
    <head>
        <meta charset="UTF-8">
        <link rel="stylesheet" href="../lib/bootstrap-4.1.1-dist/css/bootstrap.css" />
        <link rel="stylesheet" href="../lib/open-iconic-master/font/css/open-iconic-bootstrap.css" />
        <script type="text/javascript" src="../lib/JQuery/jquery-3.3.1.js"></script>
        <script type="text/javascript" src="../lib/bootstrap-4.1.1-dist/js/bootstrap.min.js"></script>        
        <title><?= Constantes::NOMBRE_SISTEMA; ?> - Gestion de Mesa de Examen</title>
    </head>
    <body>

        <?php include_once '../gui/navbar.php'; ?>
    <?php 
      @$MesaExamen= $_SESSION['llamado'];
     //Consulta a la Base de Datos para recuperar el ID, Tipo y nombre del LLAMADO
     $Consulta="SELECT L.id AS identifica, L.tipo AS tipo, L.nombre AS nombre FROM LLAMADO L WHERE L.id LIKE '%".$MesaExamen."%'";
     $Consultas=BDConexion::getInstancia()->query($Consulta);
     $row = $Consultas->fetch_assoc();
     $Llamado = new Llamado($row['identifica']);
     $Llamado->setTipo($row['tipo']);
     $Llamado->setId($row['identifica']);
     $Llamado->setNombre($row['nombre']);
     $Nombre= $Llamado->getNombre();
     $TIPO= $Llamado->getTipo();
    ?>
<div class="container-fluid "> 
    <div class="container-fluid">
        <div class="row justify-content-around">
          <div class=" col-sm-3">
                <div class="card">
                    <div class="card-header alert-info">
                        B&uacute;squeda Avanzada
                    </div>  
                    <div class="card-body">
                    <form action="examenBuscar.php" method="post">
                        <div class="form-group">
                            <div class="form-row">
                                <small>Ingrese las opciones de B&uacute;squeda a continuaci&oacute;n.</small>    
                            </div>
                        </div>
                        <div class="form-group">
                            <div class="form-row">
                                <label for="selectTipoBusqueda">Por Carrera</label>
                                <select class="form-control" id="Carrera" name="selectCarrera">
                                <option>Seleccione una Carrera</option>
                                <?php foreach ($ColeccionCarrera->getCarrera() as $Carrera) {
                                    echo '<option value="'.$Carrera->getId().'">'.$Carrera->getNombre().'</option>';
                                }  
                                ?>
                                </select>
                            </div>
                        </div>
                        <div class="form-group">
                            <div class="form-row">
                                <label for="inputExpediente">Por Asignatura</label> 
                            </div>
                            <div class="form-group">
                                <input type="text" name="buscarAsignatura" class="form-control" id ="buscarAsignatura" >
                                <div id="listaAsignatura"></div>
                            </div>
                        </div>
                        <div class="form-group">
                            <div class="form-row">
                                <label for="inputDesdeIL">Por Docente</label>                                    
                            </div>
                            <div class="form-row">
                                <input type="text" class="form-control " id="inputDocente" name="inputDocente" value="">
                                <small id="inputDocentes" class="form-text text-muted"></small>                   
                            </div>
                        </div>                                  
                        <br>                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                
                        <div class="form-group">
                        <button type="submit" class="btn btn-primary btn-block btn-lg" name="Buscar">Realizar b&uacute;squeda</button>
                        </div>
                    </form>


                    <p>
                        <a href="examen.crear.php">
                        <button type="button" class="btn btn-success btn-block btn-lg">
                            <span class="oi oi-plus"></span> Agregar Examen
                        </button>
                        </a>
                    </p>
                        <form action="../csv/reporte.php" method="POST">
                            <button tyoe="submit"  name="reporte"  class="btn btn-outline-primary">GENERAR CSV 1</button>
                            <br>
                            <br>
                            <button  type="submit" name="reporte1" class="btn btn-outline-primary">GENERAR CSV 2</button>
                        </form>
                    </div>
                </div>
            </div>
            <div class="col-md-9">
            <?php 
                $AUX="";
                @$Carrera=$_POST['selectCarrera'];
                @$Asignatura=$_POST['inputAsignatura'];
                @$Docente=$_POST['inputDocente'];
                
                if(!empty($MesaExamen)){
                    $AUX= "AND L.id = '".$MesaExamen."'";
                }
                if(empty($Asignatura)){
                    if(empty($Docente)){
                        if(empty($Carrera)){
                            $WHERE = "";
                        }else{
                        $WHERE= "AND C.id = '".$Carrera."'";
                        }
                    }else{
                    $WHERE= "AND P.nombre = '".$Docente."'";
                    }
                }else{
                $WHERE= "AND A.nombre = '".$Asignatura."'";
                }
                
                
                $reporte="SELECT C.id AS id,LM.idLlamado AS idLlamado, LM.idMesa AS idMesa, C.nombre AS Carrera, A.nombre AS Asignatura,A.id AS Asignaturaid,T.id AS tribunal, P.nombre AS presidente, P1.nombre AS vocal, LM.fechaUnica AS fechaUnica, P2.nombre AS vocal1, P3.nombre AS suplente, DATE_FORMAT(F.fecha1, '%d/%m/%Y') AS fecha1, DATE_FORMAT(F.fecha2, '%d/%m/%Y')AS fecha2, DATE_FORMAT(LM.hora,'%h:%m') AS hora
                FROM MESA_EXAMEN M  INNER JOIN TRIBUNAL T  ON M.idTribunal= T.id
                INNER JOIN PROFESOR P ON T.presidente = P.id
                LEFT JOIN PROFESOR P1 ON  T.vocal = P1.id
                LEFT JOIN PROFESOR P2 ON  T.vocal1 = P2.id
                LEFT JOIN PROFESOR P3 ON T.suplente=P3.id
                INNER JOIN ASIGNATURA A ON A.id= M.codAsignatura
                INNER JOIN MESA_EXAMEN_CARRERA MC ON MC.codMesa=M.id
                INNER JOIN CARRERA C ON MC.codCarrera=C.id
                INNER JOIN  LLAMADO_MESA_EXAMEN LM ON LM.idMesa= M.id
                INNER JOIN LLAMADO L ON L.id = LM.idLlamado
                INNER JOIN FECHA F ON F.LLAMADO_id= L.id
                WHERE  M.orden= F.orden 
                AND L.nombre like '%".$Nombre."%' 
                $AUX 
                $WHERE";

                $reporteCsv= BDConexion::getInstancia()->query($reporte);
                
            ?>    
                <div class="card">
                   <div class="card-header alert-success">
                   <span class="card-title">Listado de Examenes</span>
                    </div>
                    <div class="card-body">
                        <div>
                        <form action="../pdf/" method="POST">
                        <input type="hidden" name="id" value=<?php echo $Carrera;?>>
                        <input type="hidden" name="asignatura" value=<?php echo $Asignatura;?>>
                        <input type="hidden" name="Docente" value=<?php echo $Docente;?>>
                        <input type="hidden" name="id2" value=<?php echo $MesaExamen;?>>
                        <input type="hidden" name="Tipo" value=<?php echo $TIPO;?>>
                        <button class="btn btn-outline-warning">GENERAR PDF</button>
                        <h3 align="center">Mesa Elegida: <?php echo $Nombre;?></h3>
                        </form>
                        </div>
                    </div>
                    <div class="table-responsive">
                        <table class="table table-hover">
                            <tr scope="row">
                                <td>Cod</td>
                                <td>Carrera</td>
                                <td>Asignatura</td>
                                <td>Presidente</td>
                                <td>Vocal1</td>
                                <td>Vocal2</td>
                                <td>Suplente</td>
                                <td>1Llamado</td>
                            <?php if(empty(@$TIPO) || @$TIPO == "general"){?>
                                <td>2Llamado</td>
                                <td>fechaUnica</td>
                                <td>Hora</td>
                                <td>Ver Mas</td>
                                <td>Modificar</td>
                                <td>Eliminar</td>
                            <?php }else { ?>
                                <td>fechaUnica</td>
                                <td>Hora</td>
                                <td>Ver Mas</td>
                                <td>Modificar</td>
                                <td>Eliminar</td>
                                
                                <?php } ?>
                            </tr>
                    </div>       
                    <?php 
                        while($row = $reporteCsv->fetch_assoc()) 
                        { 
                            $id= $row['id'];
                            $carrera=$row['Carrera'];
                            $asignatura= $row['Asignatura'];
                            $presidente= $row['presidente'];
                            $vocal= $row['vocal'];
                            $vocal1 =$row['vocal1'];
                            $suplente= $row['suplente'];
                            $fecha1= $row['fecha1'];
                            $hora=$row['hora'];
                            $tribunal=$row['tribunal'];
                            $idLlamado=$row['idLlamado'];
                            $idMesa=$row['idMesa'];
                            $idasignatura=$row['Asignaturaid'];
                            $fechaUnica=$row['fechaUnica'];
                            if(empty(@$TIPO) || @$TIPO == "general"){
                                $fecha2= $row['fecha2'];
                                echo
                                '<tr>
                                <td>'.$id.'</td>
                                <td>'.$carrera.'</td>
                                <td>'.$asignatura.'</td>
                                <td>'.$presidente.'</td>
                                <td>'.$vocal.'</td>
                                <td>'.$vocal1.'</td>
                                <td>'.$suplente.'</td>
                                <td>'.$fecha1.'</td>
                                <td>'.$fecha2.'</td>
                                <td>'.$fechaUnica.'</td>
                                <td>'.$hora.'</td>
                                <td align="center">
                                <button class="btn btn-outline-primary" class="btn btn-outline-info">
                                <span class="oi oi-zoom-in"></span>
                                </button>
                                </td>
                                <td align="center">
                                    <a title="Modificar" href="examen.modificar.php?id='.$tribunal.'&pres='.$presidente.'&vol='.$vocal.'&vol1='.$vocal1.'&sup='.$suplente.'&hora='.$hora.'&llam='.$idLlamado.'&mes='.$idMesa.'">
                                    <button class="btn btn-outline-warning" class="glyphicon glyphicon-pencil" data-toggle="modal" data-target="#modaledita" onclick=agregaform"(<<?php echo $datos; ?>
                                    <span class="oi oi-pencil"></span>
                                    </button>
                                </td>
                                <td align="center">
                                <a title="Eliminar" href="examen.eliminar.php?id='.$tribunal.'&llam='.$idLlamado.'&asignatura='.$asignatura.'&idasig='.$idasignatura.'&mes='.$idMesa.'">
                                <button class="btn btn-outline-danger" class="glyphicon glyphicon-trash" ">
                                <span class="oi oi-trash"></span>
                                </button>
                                </td>
                               
                                </tr>';  
                            }else{
                                echo
                                '<tr>
                                <td>'.$id.'</td>
                                <td>'.$carrera.'</td>
                                <td>'.$asignatura.'</td>
                                <td>'.$presidente.'</td>
                                <td>'.$vocal.'</td>
                                <td>'.$vocal1.'</td>
                                <td>'.$suplente.'</td>
                                <td>'.$fecha1.'</td>
                                <td>'.$fechaUnica.'</td>
                                <td>'.$hora.'</td>
                                <button class="btn btn-outline-primary" class="btn btn-outline-info">
                                <span class="oi oi-zoom-in"></span>
                                </button>
                                </td>
                                <td align="center">
                                    <a title="Modificar" href="examen.modificar.php?id='.$tribunal.'&pres='.$presidente.'&vol='.$vocal.'&vol1='.$vocal1.'&sup='.$suplente.'&hora='.$hora.'&llam='.$idLlamado.'&mes='.$idMesa.'">
                                    <button class="btn btn-outline-warning" class="glyphicon glyphicon-pencil" data-toggle="modal" data-target="#modaledita" onclick=agregaform"(<<?php echo $datos; ?>
                                    <span class="oi oi-pencil"></span>
                                    </button>
                                </td>
                                <td align="center">
                                <a title="Eliminar" href="examen.eliminar.php?id='.$tribunal.'&llam='.$idLlamado.'&asignatura='.$asignatura.'&idasig='.$idasignatura.'&mes='.$idMesa.'">
                                <button class="btn btn-outline-danger" class="glyphicon glyphicon-trash" ">
                                <span class="oi oi-trash"></span>
                                </button>
                                </td>
                                </tr>';  
                            }
                        }  
                    ?>
                    </table>            
                </div>         
            </div>
        </div>    
        <br>
    </div>
</div>

        <?php include_once '../gui/footer.php'; ?>
    </body>
</html>
<script>
    $(document).ready(function(){
        $('#buscarAsignatura').keyup(function(){
            var query=$(this).val();
            if(query !='')
            {
                $.ajax({
                    url:"buscarAsignatura.php",
                    method:"POST",
                    data:{query:query},
                    success:function(data)
                    {

                        $('#listaAsignatura').fadeIn();
                        $('#listaAsignatura').html(data);
                    }

                });
            }
            });
         $(document).on('click', 'li', function(){  
           $('#buscarAsignatura').val($(this).text());  
           $('#listaAsignatura').fadeOut();  
           }); 
        });
</script>
