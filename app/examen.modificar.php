<?php
include_once '../lib/ControlAcceso.Class.php';
ControlAcceso::requierePermiso(PermisosSistema::PERMISO_USUARIOS);


$tribunal=$_GET["id"];
$presidente=$_GET["pres"];
$vocal1=$_GET["vol"];
$vocal2=$_GET["vol1"];
$suplente=$_GET["sup"];
$hora=$_GET["hora"];
$idLlamado=$_GET["llam"];
$idMesa=$_GET["mes"];

?>
<html>
    <head>
      <meta charset="UTF-8">
      <link rel="stylesheet" href="../lib/bootstrap-4.1.1-dist/css/bootstrap.css" />
      <link rel="stylesheet" href="../lib/open-iconic-master/font/css/open-iconic-bootstrap.css" />
      <script type="text/javascript" src="../lib/JQuery/jquery-3.3.1.js"></script>
      <script type="text/javascript" src="../lib/bootstrap-4.1.1-dist/js/bootstrap.min.js"></script>
        <title><?= Constantes::NOMBRE_SISTEMA; ?> - Actualizar Examen</title>
    </head>
    <body>
        <?php include_once '../gui/navbar.php'; ?>
        <div class="container">
            <form action="examen.modificar.procesar.php" method="post">
                <div class="card">
                    <div class="card-header">
                        <h3>Actualizar Examen</h3>
                        <p>
                            Complete los campos que desea modificar.
                            Luego, presione el bot&oacute;n <b>Confirmar</b>.<br />
                            Si desea cancelar, presione el bot&oacute;n <b>Cancelar</b>.
                        </p>
                    </div>
                    <div class="card-body">
                        <div class="form-group">
                            <label for="inputFechaInicio">Presidente</label>
                            <input type="text" name="Presidente" class="form-control" id="inputPresidente" value="<?= $presidente; ?>" placeholder="Ingrese el presidente a modificar" required="">
                        </div>
                        <div class="form-group">
                            <label for="inputFechaFinal">Vocal 1</label>
                            <input type="datetime" name="vocal1" class="form-control" id="inputVocal1" value="<?= $vocal1; ?>" placeholder="Ingrese el vocal 1 a modificar" required="">
                        </div>
                        <div class="form-group">
                            <label for="inputNombre">Vocal 2</label>
                            <input type="text" name="vocal2" class="form-control" id="inputVocal2" value="<?= $vocal2; ?>" placeholder="Ingrese el vocal 2 a modificar" required="">
                        </div>
                        <div class="form-group">
                            <label for="inputDescripcion">Suplente</label>
                            <input type="text" name="Suplente" class="form-control" id="inputSuplente" value="<?= $suplente; ?>" placeholder="Ingrese un Suplente" required="">
                        </div>
                        <div class="form-group">
                            <label for="inputDescripcion">Hora</label>
                            <input type="text" name="Hora" class="form-control" id="inputHora" value="<?= $hora; ?>" placeholder="Ingrese la hora de la mesa" required="">
                        </div>
                    <input type="hidden" name="idLlamado" class="form-control" id="idLlamado" value="<?= $idLlamado; ?>" >
                    <input type="hidden" name="idMesa" class="form-control" id="idMesa" value="<?= $idMesa; ?>" >
                    <input type="hidden" name="tribunal" class="form-control" id="tribunal" value="<?= $tribunal; ?>" >
                      </div>
                      <div class="class-footer">
                          <button type="submit" class="btn btn-outline-success">
                              <span class="oi oi-check"></span>
                              Confirmar
                          </button>
                          <a href="gestionExamen.php">
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
