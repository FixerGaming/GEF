<?php
include_once '../lib/ControlAcceso.Class.php';
ControlAcceso::requierePermiso(PermisosSistema::PERMISO_USUARIOS);
include_once '../modelo/ColeccionLicencia.php';
include_once '../modelo/ColeccionTipoLicencia.php';
include_once '../modelo/ColeccionDocentes.php';
$id=$_GET["id"];
$id1=$_GET["id1"];
$id2=$_GET["id2"];
$Docente = new Docente($id2);
$Licencia = new Licencia($id);
$TipoLicencia = new TipoLicencia($id1);
$fecha = new DateTime($Licencia->getFechaInicio());
$fecha_d_m_y1 = $fecha->format('d-m-Y');
$fecha = new DateTime($Licencia->getFechaFinal());
$fecha_d_m_y2 = $fecha->format('d-m-Y');
?>
<html>
    <head>
      <meta charset="UTF-8">
      <link rel="stylesheet" href="../lib/bootstrap-4.1.1-dist/css/bootstrap.css" />
      <link rel="stylesheet" href="../lib/open-iconic-master/font/css/open-iconic-bootstrap.css" />
      <script type="text/javascript" src="../lib/JQuery/jquery-3.3.1.js"></script>
      <script type="text/javascript" src="../lib/bootstrap-4.1.1-dist/js/bootstrap.min.js"></script>
      <script src="../lib/validar.js"></script>
        <title><?= Constantes::NOMBRE_SISTEMA; ?> - Actualizar Licencia</title>
    </head>
    <body>
        <?php include_once '../gui/navbar.php'; ?>
        <div class="container">
            <form action="novedad.modificar.procesar.php" method="post">
                <div class="card">
                    <div class="card-header">
                        <h3>Actualizar Licencia</h3>
                        <p>
                            Complete los campos que desea modificar.
                            Luego, presione el bot&oacute;n <b>Confirmar</b>.<br />
                            Si desea cancelar, presione el bot&oacute;n <b>Cancelar</b>.
                        </p>
                    </div>
                    <div class="card-body">
                       <h4 class="card-text">Nombre de Docente</h4>
                       <p> <?= $Docente->getNombre(); ?></p>
                       <hr />
                       <h4 class="card-text">Apellido de Docente</h4>
                       <p> <?= $Docente->getApellido(); ?></p>
                       <hr />
                        <div class="form-group">
                            <label for="inputFechaInicio">Fecha Inicio</label>
                            <input type="date" name="fechainicio" class="form-control" id="inputFechaInicio" oninput="validar('inputFechaInicio')" value="<?=$Licencia->getFechaInicio() ?>" placeholder="Ingrese la fecha inicial de la licencia" required="" pattern="(0[1-9]|1[0-9]|2[0-9]|3[01]).(0[1-9]|1[012]).[0-9]{4}"title="Ingrese formato de fecha dd/mm/yyyy">

                        </div>
                        <div class="form-group">
                            <label for="inputFechaFinal">Fecha Final</label>
                            <input type="date" name="fechafinal" class="form-control" id="inputFechaFinal" oninput="validate()" value="<?= $Licencia->getFechaFinal()?>" placeholder="Ingrese la fecha limite de licencia" required="" pattern="(0[1-9]|1[0-9]|2[0-9]|3[01]).(0[1-9]|1[012]).[0-9]{4}" title="Ingrese formato de fecha dd/mm/yyyy">

                        </div>
                        <div class="form-group">
                            <label for="inputNombre">Tipo de Licencia</label>
                            <input type="text" name="nombre" class="form-control" id="inputNombre" oninput="validar('inputNombre')" value="<?= $TipoLicencia->getNombre(); ?>" placeholder="Ingrese el nombre de la liciencia" required="" pattern="[A-Za-z]{4-23}">
                        </div>
                        <div class="form-group">
                            <label for="inputDescripcion">Descripcion</label>
                            <input type="text" name="descripcion" class="form-control" id="inputDescripcion" oninput="validar('inputDescripcion')" value="<?= $TipoLicencia->getDescripcion(); ?>" placeholder="Ingrese descripcion de la licencia" required=""pattern"[A-Za-z]{4-45}" >
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
<script>  
function validate() {
    if(document.getElementById('inputFechaFinal').value<document.getElementById('inputFechaInicio').value) 
        document.getElementById('inputFechaFinal').setCustomValidity('Esta fecha debe ser mayor a la fecha inicial');
        //document.getElementById('inputFechaFinal').style.borderColor="red";
    else 
        document.getElementById('inputFechaFinal').setCustomValidity('');
        //document.getElementById('inputFechaFinal').style.borderColor="green";
}
</script>