<?php  
include_once '../lib/ControlAcceso.Class.php';
ControlAcceso::requierePermiso(PermisosSistema::PERMISO_USUARIOS);
include_once '../modelo/ColeccionDocentes.php';
include_once '../modelo/ColeccionCargo.php';
include_once '../modelo/ColeccionDepartamento.php';
include_once  '../modelo/ColeccionMesaExamen.php';
include_once  '../modelo/ColeccionTribunal.php';
include_once  '../modelo/ColeccionAsignaturas.php';
$ColeccionDocente = new ColeccionDocentes();
$ColeccionCargo = new ColeccionCargo();
$ColeccionDepartamento = new ColeccionDepartamento(); 
$ColeccionMesaExamen = new ColeccionMesaExamen();
$ColeccionTribunal = new ColeccionTribunal();
$ColeccionAsignaturas = new ColeccionAsignaturas();
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
    <script type="text/javascript" src="../lib/alertifyjs/alertify.js"></script>
    <script type="text/javascript" src="../lib/validar.js"></script>
        <title><?= Constantes::NOMBRE_SISTEMA; ?> - Gestionar Afectacion</title>
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
                    <form action="docente.buscar.php" method="post">
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
                                <input type="text" class="form-control" id="inputDocenteb" name="buscardocente" value="" oninput="validar('inputDocenteb')" pattern="[A-Za-z]{4,23}">
                                <small id="inputAsignaturas" class="form-text text-muted"></small>
                            </div>
                        </div>
                        <div class="form-group">
                            <div class="form-row">
                                <label for="inputDesdeIL">Por Asignatura</label>
                            </div>
                            <div class="form-row">
                                <input type="text" class="form-control " id="inputDnib" name="buscardni" value="" oninput="validar('inputDnib')" pattern="[0-9]{8}">
                                <small id="inputDocentes" class="form-text text-muted"></small>
                            </div>
                        </div>
                        <br>
                        <div class="form-group">
                        <button type="submit" class="btn btn-primary btn-block btn-lg" name="Buscar">Realizar b&uacute;squeda</button>
                        </div>
                    </form>
                    <p>
                        <a href="docente.crear.php">
                        <button type="button" class="btn btn-success btn-block btn-lg">
                            <span class="oi oi-plus"></span> Agregar Tribunal
                        </button>
                        </a>
                    </p>
                    </div>
                </div>
            </div>
            <div class="col-md-9 ml-md-auto">
                <div class="card">
                   <div class="card-header alert-success">
                   <span class="card-title">Listado de Tribunales</span>
                    </div>
                    <div class="card-body">
                        <table class ="table table-hover table-condensed table-bordered">
                            <tr scope="row">
                              <td>Asignatura</td>
                              <td>Presidente</td>
                              <td>Vocal</td>
                              <td>Vocal 2</td>
                              <td>Suplente</td>
                              <td>Ver mas</td>
                              <td>Editar</td>
                              <td>Eliminar</td>
                            </tr>
                            <tr>
                                <?php foreach ($ColeccionTribunal->getTribunales() as $Tribunal)
                                        {
                                          foreach ($ColeccionMesaExamen->getMesas() as $MesaExamen)
                                            {
                                              foreach ($ColeccionAsignaturas->getAsignaturas() as $Asignatura) {
                                              
                                              
                                                if($Tribunal->getID () == $MesaExamen->getIdtribunal() && $Asignatura->getId() == $MesaExamen->getIdAsignatura())
                                                    {
                                                      $idtitular= $Tribunal->getPresidente();
                                                      $idvocal= $Tribunal->getVocal();
                                                      $idvocal1= $Tribunal->getVocal1();
                                                      $idsuplente= $Tribunal->getSuplente();
                                                      $titular = new Docente($idtitular);
                                                      $vocal = new Docente($idvocal);
                                                      $vocal1 = new Docente($idvocal);
                                                      if (!empty($idsuplente))
                                                      {

                                                      $suplente = new Docente($idsuplente);


                                    ?>
                                    <td><?= $Asignatura->getNombre(); ?></td>
                                    <td><?= $titular->getNombre(); ?></td>
                                    <td><?= $vocal->getNombre();?></td>
                                    <td><?= $vocal1->getNombre(); ?></td>
                                    <td><?= $suplente->getNombre();?></td>
                                    <td>
                                        <a title="Ver detalle" href="afectacion.ver.php?id=<?= $Tribunal->getId();?>&id1=<?= $MesaExamen->getId(); ?>&id2=<?=$Asignatura->getId(); ?>">
                                            <button type="button" class="btn btn-outline-info">
                                                <span class="oi oi-zoom-in"></span>
                                            </button></a>

                                    </td>
                                    <td>
                                        <a title="Modificar" href="afectacion.modificar.php?id=<?= $Tribunal->getId();?>&id1=<?= $MesaExamen->getId();?>">
                                            <button type="button" class="btn btn-outline-warning">
                                                <span class="oi oi-pencil"></span>
                                            </button></a>
                                    </td>
                                    <td>
                                        <a title="Eliminar" href="afectacion.eliminar.php?id=<?= $Tribunal->getId(); ?>&id1=<?= $MesaExamen->getId();?>">
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
                       } ?>
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
