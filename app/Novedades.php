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
$ColeccionDepartamento = new ColeccionDepartamento(); ?>
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
                    <form action="?accion=busquedaAvanzada" method="post">
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

                        <br>
                        <div class="form-group">
                        <button type="submit" class="btn btn-primary btn-block btn-lg" name="Buscar">Realizar b&uacute;squeda</button>
                        </div>
                    </form>
                    <p>
                        <a href="novedad.crear.php">
                        <button type="button" class="btn btn-success btn-block btn-lg">
                            <span class="oi oi-plus"></span> Nueva Novedad
                        </button>
                        </a>
                    </p>
                    </div>
                </div>
            </div>
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
                      <?php foreach ($ColeccionLicencias->getLicencias() as $Licencia)
                       {
                         foreach ($ColeccionDocente->getDocentes() as $Docente)
                         {
                           foreach($ColeccionTipoLicencias->getTipoLicencias() as $TipoLicencia)
                            {
                              foreach($ColeccionDepartamento->getDepartamentos() as $Departamento)
                              {
                              if ($Licencia->getIdProfesor() == $Docente->getId() && $Licencia->getId() == $TipoLicencia->getIdLicencia() && $Docente->getIdDepartamento()==$Departamento->getId())
                              {
                                $datetime = date_create(date("d-m-Y"));
                                $Color="";
                                $datetimecomparable= $Licencia->getFechaFinal();
                                $datetime2=date_create_from_format('Y-m-d', $datetimecomparable);
                                if ($datetime2 < $datetime)
                                {
                                  $Color="#9c9c9c";
                                  echo "es mas chico";
                                }
                                else
                                {
                                  $Color="#ffffff";
                                  echo "es mas grande";
                                }



                         ?>
                         <td style="background-color: <?php echo $Color;?>"><?= $Docente->getNombre(); ?></td>
                         <td style="background-color:".$Color."" ><?= $Docente->getApellido(); ?></td>
                         <td style="background-color:".$Color."" ><?= $Departamento->getNombre(); ?></td>
                         <td style="background-color:".$Color.""  width="700"><?= $Licencia->getFechaInicio(),"/",$Licencia->getFechaFinal();?></td>
                         <td style="background-color:".$Color."" ><?= $TipoLicencia->getNombre();?></td>
                         <td style="background-color:".$Color."" >
                             <a title="Ver detalle" href="novedad.ver.php?id=<?= $Licencia->getId();?>&id1=<?= $TipoLicencia->getId();?>">
                                 <button type="button" class="btn btn-outline-info">
                                     <span class="oi oi-zoom-in"></span>
                                 </button></a>

                         </td>
                         <td style="background-color:".$Color."" >
                             <a title="Modificar" href="novedad.modificar.php?id=<?= $Licencia->getId();?>&id1=<?= $TipoLicencia->getId();?>">
                                 <button type="button" class="btn btn-outline-warning">
                                     <span class="oi oi-pencil"></span>
                                 </button></a>
                         </td>
                         <td style="background-color:".$Color."">
                             <a title="Eliminar" href="novedades.eliminar.php?id=<?= $Licencia->getId(); ?>&id1=<?= $TipoLicencia->getId();?>&id2=<?=$Docente->getId();?>">
                               <button class="btn btn-outline-danger" class="btn btn-outline-info">
                                  <span class="oi oi-trash"></span>
                               </button></a>
                         </td>
                         </tr>
        <?php

                              }
                             }
                          }
                        }
                     }
        ?>
                    </table>
                  </div>
              </div>
                <div class="card-footer">
                    <ul class="pagination justify-content-center">
                    <li class = "page-item active"><a class = "page-link" href = "/apps/digesto2018/vista/index.php?pagina=1&accion=busquedaAvanzada"> 1</a></li><li class = "page-item "><a class = "page-link" href = "/apps/digesto2018/vista/index.php?pagina=2&accion=busquedaAvanzada"> 2</a></li><li class = "page-item"><a class = "page-link" href = "/apps/digesto2018/vista/index.php?pagina=2&accion=busquedaAvanzada"> &gt;</a></li>        </ul>
                    <span class="pagination justify-content-center">
                        Mostrando 1-10 de 6384
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
