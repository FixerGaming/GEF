<?php
include_once '../lib/ControlAcceso.Class.php';
ControlAcceso::requierePermiso(PermisosSistema::PERMISO_USUARIOS);
include_once '../modelo/ColeccionCarrera.php';
$ColeccionCarrera = new ColeccionCarrera()
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
<div class="container-fluid "> 
    <div class="container-fluid">
        <div class="row justify-content-around">
          <div class=" col-sm-3">
                <div class="card">
                    <div class="card-header alert-info">
                        B&uacute;squeda Avanzada
                    </div>  
                    <div class="card-body">
                    <form action="?accion=busquedaAvanzada" method="post">
                        <div class="form-group">
                            <div class="form-row">
                                <small>Ingrese las opciones de B&uacute;squeda a continuaci&oacute;n.</small>                    
                            </div>
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
                            <div class="form-row">
                                <input type="text" class="form-control" id="Asignatura" name="inputAsignatura" value="">
                                <small  class="form-text text-muted"></small>                   
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
                        <div class="form-check">
                            <input class="form-check-input" type="checkbox" value="general" id="general" name="General">
                            <label class="form-check-label" for="defaultCheck1">
                                General
                            </label>
                        </div>
                        <div class="form-check">
                            <input class="form-check-input" type="checkbox" value="todotiempo" id="todoTiempo" name="TodoTiempo">
                            <label class="form-check-label" for="defaultCheck1">
                                Todo Tiempo
                            </label>
                        </div>
                        <div class="form-check">
                            <input class="form-check-input" type="checkbox" value="extraordinaria" id="extraordinaria" name="Extraordinaria">
                            <label class="form-check-label" for="defaultCheck1">
                                Extraordinaria
                            </label>
                        </div>
                        <br>                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                
                        <div class="form-group">
                        <button type="submit" class="btn btn-primary btn-block btn-lg" name="Buscar">Realizar b&uacute;squeda</button>
                        </div>
                    </form>
                    </div>
                </div>
            </div>
            <div class="col-md-9">
            <?php 
                @$ID=$_POST['identificador']; 
            if(isset($_POST['Buscar'])){ 
                
               $reporte="SELECT C.id, C.nombre AS Carrera, A.nombre AS Asignatura, P.nombre AS presidente,P1.nombre AS vocal,P2.nombre, P3.nombre AS vocal1, DATE_FORMAT(F.fecha1, '%d/%m/%Y') AS fecha1, DATE_FORMAT(F.fecha2, '%d/%m/%Y')AS fecha2, DATE_FORMAT(LM.hora,'%h:%m') AS hora
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
                WHERE L.id LIKE '%".$ID."%'";

                $reporteCsv= BDConexion::getInstancia()->query($reporte);
            ?>    
                <div class="card">
                   <div class="card-header alert-success">
                   <span class="card-title">Listado de Examenes</span>
                    </div>
                    <div class="card-body">
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
                                <td>2Llamado</td>
                                <td>Hora</td>
                                <td>Modificar</td>
                                <td>Eliminar</td>
                                <td>Ver Mas</td>
                                
                            </tr>
                    </div>       
                    <?php 
                        while($row = $reporteCsv->fetch_assoc())  
                        { 
                            echo
                            '<tr>
                            <td>'.$row['id'].'</td>
                            <td>'.$row['Carrera'].'</td>
                            <td>'.$row['Asignatura'].'</td>
                            <td>'.$row['presidente'].'</td>
                            <td>'.$row['vocal'].'</td>
                            <td>'.@$row['vocal1'].'</td>
                            <td>'.@$row['suplente'].'</td>
                            <td>'.$row['fecha1'].'</td>
                            <td>'.$row['fecha2'].'</td>
                            <td>'.$row['hora'].'</td>
                            <td align="center">
                                <button class="btn btn-outline-warning" class="glyphicon glyphicon-pencil" data-toggle="modal" data-target="#modaledita" onclick=agregaform"(<<?php echo $datos; ?>
                                <span class="oi oi-pencil"></span>
                                </button>
                            </td>
                            <td align="center">
                                <button class="btn btn-outline-danger" class="glyphicon glyphicon-trash" onclick="PreguntarSiNO()">
                                <span class="oi oi-trash"></span>
                                </button>
                            </td>
                            <td align="center">
                                <button class="btn btn-outline-primary" class="btn btn-outline-info">
                                <span class="oi oi-zoom-in"></span>
                                </button>
                            </td>
                            </tr>';  
                           // var_dump($row);
                        }  
                    ?>
                    </table>            
                </div> 
                <div class="card-footer">
                    <ul class="pagination justify-content-center">
                    <li class = "page-item active"><a class = "page-link" href = "/apps/digesto2018/vista/index.php?pagina=1&accion=busquedaAvanzada"> 1</a></li><li class = "page-item "><a class = "page-link" href = "/apps/digesto2018/vista/index.php?pagina=2&accion=busquedaAvanzada"> 2</a></li><li class = "page-item"><a class = "page-link" href = "/apps/digesto2018/vista/index.php?pagina=2&accion=busquedaAvanzada"> &gt;</a></li>        </ul> 
                    <span class="pagination justify-content-center">
                        Mostrando 1-10 de 6384        
                    </span>
                </div>
            <?php } ?>           
            </div>
        </div>    
        <br>
    </div>
</div>
        <?php include_once '../gui/footer.php'; ?>
    </body>
</html>

