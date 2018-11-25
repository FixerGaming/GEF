<?php
include_once '../lib/ControlAcceso.Class.php';
ControlAcceso::requierePermiso(PermisosSistema::PERMISO_USUARIOS);
include_once '../modelo/ColeccionDocentes.php';
include_once '../modelo/ColeccionLicencia.php';
include_once '../modelo/ColeccionTipoLicencia.php';
include_once '../modelo/ColeccionDepartamento.php';
$ColeccionDocente = new ColeccionDocentes();
$ColeccionLicencias = new ColeccionLicencia();
$ColeccionTipoLicencias = new ColeccionTipoLicencia();
$ColeccionDepartamento = new ColeccionDepartamento();


 ?>
<html>
    <head>
      <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no">
      <link rel="stylesheet" href="../lib/bootstrap-4.1.1-dist/css/bootstrap.css" />
      <link rel="stylesheet" href="../lib/open-iconic-master/font/css/open-iconic-bootstrap.css" />
      <link rel="stylesheet" href="../lib/bootstrap-4.1.1-dist/css/uargflow_footer.css" />
      <link rel="stylesheet" href="../lib/alertifyjs/css/alertify.css" />
      <link rel="stylesheet" href="../lib/alertifyjs/css/themes/default.css" />
      <script type="text/javascript" src="../lib/JQuery/jquery-3.3.1.js"></script>
      <script type="text/javascript" src="../lib/bootstrap-4.1.1-dist/js/bootstrap.min.js"></script>
      <script type="text/javascript" src="../lib/alertifyjs/alertify.min.js"></script>
      <script src="../lib/validar.js"></script>
    <script type="text/javascript" src="../lib/alertifyjs/alertify.js"></script>
        <title><?= Constantes::NOMBRE_SISTEMA; ?> - Gestionar Novedad</title>
    </head>
    <body>
        <?php include_once '../gui/navbar.php'; ?>
<div class="container-fluid">
    <div class="container">
        <div class="row justify-content-around">
          <div class=" col-sm-3">
                <div class="card">
                    <div class="card-header alert-info">
                        B&uacute;squeda Avanzada
                    </div>
                    <div class="card-body">
                    <form action="novedadesbuscar.php" method="post">
                        <div class="form-group">
                            <div class="form-row">
                                <small>Ingrese las opciones de B&uacute;squeda a continuaci&oacute;n.</small>
                            </div>
                        </div>
                        <div class="form-group">
                            <div class="form-row">
                                <label for="inputExpediente">Por Docente</label>
                            </div>
                            <div class="form-row">
                                <input type="text" class="form-control" id="inputDocente" name="inputDocente" value="">
                                <small id="inputAsignaturas" class="form-text text-muted"></small>
                            </div>
                        </div>
                        <div class="form-group">
                            <div class="form-row">
                                <label for="inputDesdeIL">Por Fecha de Inicio</label>
                            </div>
                            <div class="form-row">
                                <input type="text" class="form-control " id="inputFechainicio" name="inputFechainicio" value="">
                                <small id="inputDocentes" class="form-text text-muted"></small>
                            </div>
                        </div>
                        <div class="form-group">
                            <div class="form-row">
                                <label for="inputDesdeIL">Por Fecha de finalizacion</label>
                            </div>
                            <div class="form-row">
                                <input type="text" class="form-control " id="inputfechafinalizacion" name="inputFechafinalizacion" value="">
                                <small id="inputFecha" class="form-text text-muted"></small>
                            </div>
                        </div>


                    </form>
                    <p>
                        <a href="novedad.crear.php">
                        <button type="button" class="btn btn-success btn-block btn-lg">
                            <span class="oi oi-plus"></span> Agregar Novedad
                        </button>
                        </a>
                    </p>
                    <p>
                        <a href="Novedades.php">
                        <button type="button" class="btn btn-danger btn-block btn-lg">
                            <span class="oi oi-x"></span> Cancelar
                        </button>
                        </a>
                    </p>
                    </div>
                </div>
            </div>

<?php
//Se reciben los datos del post
$nombredocente = $_POST["docenteb"];
$fechainicial = $_POST["fechainiciob"];
$fechafinal = $_POST["fechafinalb"];
//se cambian el formato de las fechas buscadas
$fecha = new DateTime($fechainicial);
$fecha_d_m_y1 = $fecha->format('Y/m/d');
$fecha = new DateTime($fechafinal);
$fecha_d_m_y2 = $fecha->format('Y/m/d');
//
if(empty($nombredocente))
{
    if(empty($fecha_d_m_y1))
    {
        if(empty($fecha_d_m_y2))
        {
            $WHERE = "";
        }else
        {

        $WHERE= "L.fechaFinal = '".$fecha_d_m_y2."'";
        }
    }else
    {

    $WHERE= "L.fechaInicio = '".$fecha_d_m_y1."'";
    }
}else
{
$WHERE= "P.nombre = '".$nombredocente."'";
}

$reporte ="SELECT P.nombre, P.apellido,P.id,D.nombre AS departamento,L.fechaInicio,L.fechaFinal,L.id AS Licenciaid,t.id AS idtipo,T.nombre AS Tipo,T.descripcion FROM profesor P INNER JOIN departamento D
ON P.idDepartamento=D.id INNER JOIN licencia L
ON L.idProfesor = P.id INNER JOIN tipo_licencia T
ON T.idLicencia=L.id WHERE $WHERE ";


                $reportebuscar= BDConexion::getInstancia()->query($reporte);
 ?>


            <div class="col-md-9 ml-md-auto">
                <div class="card">
                   <div class="card-header alert-success">
                   <span class="card-title">Listado de Novedades</span>
                    </div>
                    <div class="card-body">
                        <table class ="table table-hover table-condensed table-bordered">
                            <tr scope="row">
                                <td>Nombre</td>
                                <td>Apellido</td>
                                <td>Departamento</td>
                                <td width="700">Dias</td>
                                <td>Regimen</td>
                                <td>Ver Mas</td>
                                <td>Editar</td>
                                <td>Eliminar</td>
                            </tr>

                    <tr>
                      <?php   while($row = $reportebuscar->fetch_assoc())
                       {
                         $datetime = date_create(date("d-m-Y"));
                         $Color="";
                         $datetimecomparable=$row['fechaFinal'];
                         $datetime2=date_create_from_format('Y-m-d', $datetimecomparable);
                                if ($datetime2 < $datetime)
                                {
                                  $Color="#9c9c9c";

                                }
                                else
                                {
                                  $Color="#ffffff";


                                }

                        $nombreprofesor=  $row['nombre'];
                        $apellidoprofesor=  $row ['apellido'];
                        $nombredepartamento = $row ['departamento'];
                        $tipo=$row ['Tipo'];
                        $Licenciaid=$row ['Licenciaid'];
                        $idprofesor=$row ['id'];
                        $idtipolicenciaa=$row ['idtipo'];
                        $fecha1 = new DateTime($row["fechaInicio"]);
                        $fecha_d_m_y1 = $fecha1->format('d-m-Y');
                        $fecha2 = new DateTime($row["fechaFinal"]);
                        $fecha_d_m_y2 = $fecha2->format('d-m-Y');

                         echo '
                         <td style="background-color:'. $Color.'" >'.$nombreprofesor.'</td>
                         <td style="background-color:'. $Color.'" >'.$apellidoprofesor.'</td>
                         <td style="background-color:'. $Color.'" >'.$nombredepartamento.'</td>
                         <td style="background-color:'. $Color.'"  width="700">'.$fecha_d_m_y1.'/'.$fecha_d_m_y2.'</td>
                         <td style="background-color:'. $Color.'" >'.$tipo.'</td>
                         <td style="background-color:'. $Color.'" >
                             <a title="Ver detalle" href="novedad.ver.php?id='.$Licenciaid.'&id1='.$idtipolicenciaa.'">
                                 <button type="button" class="btn btn-outline-info">
                                     <span class="oi oi-zoom-in"></span>
                                 </button></a>

                         </td>
                         <td style="background-color:'. $Color.'" >
                             <a title="Modificar" href="novedad.modificar.php?id='.$Licenciaid.'&id1='.$idtipolicenciaa.'">
                                 <button type="button" class="btn btn-outline-warning">
                                     <span class="oi oi-pencil"></span>
                                 </button></a>
                         </td>
                         <td style="background-color:'. $Color.'">
                             <a title="Eliminar" href="novedades.eliminar.php?id='.$Licenciaid.'&id1='.$idtipolicenciaa.'&id2='.$idprofesor.'">
                               <button class="btn btn-outline-danger" class="btn btn-outline-info">
                                  <span class="oi oi-trash"></span>
                               </button></a>
                         </td>
                         </tr>';
                        } ?>
                    </table>
                  </div>
              </div>
                <div class="card-footer">
                    <ul class="pagination justify-content-center">
                    <li class = "page-item active"><a class = "page-link" href = "/apps/digesto2018/vista/index.php?pagina=1&accion=busquedaAvanzada"> 1</a></li><li class = "page-item "><a class = "page-link" href = "/apps/digesto2018/vista/index.php?pagina=2&accion=busquedaAvanzada"> 2</a></li><li class = "page-item"><a class = "page-link" href = "/apps/digesto2018/vista/index.php?pagina=2&accion=busquedaAvanzada"> &gt;</a></li>        </ul>
                    <span class="pagination justify-content-center">
                        Mostrando 1-5 de 10
                    </span>
                </div>
            </div>
        </div>
        <br>
    </div>
</div>
        <?php include_once '../gui/footer.php'; ?>
    </body>
</html>
