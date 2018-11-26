<?php
include_once '../lib/ControlAcceso.Class.php';
ControlAcceso::requierePermiso(PermisosSistema::PERMISO_USUARIOS);


$fecha1=$_GET['fecha1'];
$fecha2=$_GET['fecha2'];
$hora=$_GET["hora"];
$idLlamado=$_GET["llam"];
$idMesa=$_GET["mes"];
$TIPO=$_GET["tipo"];

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
                            <label for="inputFechaInicio">Primer Llamado</label>
                            <div class="col-sm-10">
                                <input type="text" readonly class="form-control-plaintext" id="staticEmail" value=<?php echo $fecha1?>>
                            </div>
                        </div>
                        <?php if($fecha2 != null){?>
                        <div class="form-group">
                            <label for="inputFechaInicio">Segundo Llamado</label>
                            <div class="col-sm-10">
                                <input type="text" readonly class="form-control-plaintext" id="staticEmail" value=<?php echo $fecha2?>>
                            </div>
                        </div>
                        <?php }?>
                        <div class="form-group">
                            <label for="inputFechaInicio">Primer Llamado</label>
                            <input type="date" name="fechainicio" class="form-control" id="inputFechaInicio"  placeholder="Ingrese la fecha de inicio" oninput="validar('inputFechaInicio')" required pattern="(0[1-9]|1[0-9]|2[0-9]|3[01]).(0[1-9]|1[012]).[0-9]{4}"title="Ingrese formato de fecha dd/mm/yyyy" >
                        </div>
                        <div class="invalid-feedback">
                          Ingresar Dia de Inicio
                        </div>
                        <?php if($fecha2 != null){?>
                        <div class="form-group">
                            <label for="inputFechaFinal">Segundo Llamado</label>
                            <input type="date" name="fechafinal" class="form-control" id="inputFechaFinal"  placeholder="Ingrese la fecha de finalizacion" oninput="validate()" required pattern="(0[1-9]|1[0-9]|2[0-9]|3[01]).(0[1-9]|1[012]).[0-9]{4}" title="Ingrese formato de fecha dd/mm/yyyy">
                        </div>
                        <div class="invalid-feedback">
                          Ingresar Dia de Fin
                        </div> 
                        <?php }?>
                        <div class="form-group">
                            <label for="inputDescripcion">Hora</label>
                            <input type="text" name="Hora" class="form-control" id="inputHora" value="<?= $hora; ?>" placeholder="Ingrese la hora de la mesa" required="">
                        </div>
                    <input type="hidden" name="idLlamado" class="form-control" id="idLlamado" value="<?= $idLlamado; ?>" >
                    <input type="hidden" name="idMesa" class="form-control" id="idMesa" value="<?= $idMesa; ?>" >
                    <input type="hidden" name="tipoLlamado" class="form-control" id="tipoLlamado" value="<?= $TIPO; ?>" >
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
