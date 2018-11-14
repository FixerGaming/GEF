<?php
include_once '../lib/ControlAcceso.Class.php';
ControlAcceso::requierePermiso(PermisosSistema::PERMISO_USUARIOS);
include_once '../modelo/ColeccionLicencia.php';
include_once '../modelo/ColeccionTipoLicencia.php';
$id=$_GET["id"];
$id1=$_GET["id1"];
$Licencia = new Licencia($id);
$TipoLicencia = new TipoLicencia($id1);
?>
<html>
    <head>
      <meta charset="UTF-8">
      <link rel="stylesheet" href="../lib/bootstrap-4.1.1-dist/css/bootstrap.css" />
      <link rel="stylesheet" href="../lib/open-iconic-master/font/css/open-iconic-bootstrap.css" />
      <script type="text/javascript" src="../lib/JQuery/jquery-3.3.1.js"></script>
      <script type="text/javascript" src="../lib/bootstrap-4.1.1-dist/js/bootstrap.min.js"></script>
        <title><?= Constantes::NOMBRE_SISTEMA; ?> - Actualizar Docente</title>
    </head>
    <body>
        <?php include_once '../gui/navbar.php'; ?>
        <div class="container">
            <form action="novedad.modificar.procesar.php" method="post">
                <div class="card">
                    <div class="card-header">
                        <h3>Actualizar Docente</h3>
                        <p>
                            Complete los campos que desea modificar.
                            Luego, presione el bot&oacute;n <b>Confirmar</b>.<br />
                            Si desea cancelar, presione el bot&oacute;n <b>Cancelar</b>.
                        </p>
                    </div>
                    <div class="card-body">
                        <div class="form-group">
                            <label for="inputFechaInicio">Fecha Inicio</label>
                            <input type="datetime" name="fechainicio" class="form-control" id="inputFechaInicio" value="<?= $Licencia->getFechaInicio(); ?>" placeholder="Ingrese la fecha inicial de la licencia" required="">
                        </div>
                        <div class="form-group">
                            <label for="inputFechaFinal">Fecha Final</label>
                            <input type="datetime" name="fechafinal" class="form-control" id="inputFechaFinal" value="<?= $Licencia->getFechaFinal(); ?>" placeholder="Ingrese la fecha limite de licencia" required="">
                        </div>
                        <div class="form-group">
                            <label for="inputNombre">Nombre</label>
                            <input type="text" name="nombre" class="form-control" id="inputNombre" value="<?= $TipoLicencia->getNombre(); ?>" placeholder="Ingrese el nombre de la liciencia" required="">
                        </div>
                        <div class="form-group">
                            <label for="inputDescripcion">Descripcion</label>
                            <input type="text" name="descripcion" class="form-control" id="inputDescripcion" value="<?= $TipoLicencia->getDescripcion(); ?>" placeholder="Ingrese descripcion de la licencia" required="">
                        </div>
                    <input type="hidden" name="id" class="form-control" id="id" value="<?= $Licencia->getId(); ?>" >
                    <input type="hidden" name="id1" class="form-control" id="id1" value="<?= $TipoLicencia->getId(); ?>" >
                      </div>
                      <div class="class-footer">
                          <button type="submit" class="btn btn-outline-success">
                              <span class="oi oi-check"></span>
                              Confirmar
                          </button>
                          <a href="Novedades.php">
                              <button type="button" class="btn btn-outline-danger">
                                  <span class="oi oi-x"></span>
                                  Cancelar
                              </button>
                          </a>
                      </div>
                </div>
            </form>
        </div>
          <?php include_once '../gui/footer.php'; ?>
    </body>
</html>
