<?php
include_once '../lib/ControlAcceso.Class.php';
ControlAcceso::requierePermiso(PermisosSistema::PERMISO_USUARIOS);
include_once '../modelo/BDConexion.Class.php';
include_once '../modelo/ColeccionTribunal.php';
include_once '../modelo/ColeccionMesaExamen.php';

$DatosFormulario = $_POST;


$query = "INSERT INTO tribunal VALUES (null,'{$DatosFormulario["selectPresidente"]}','{$DatosFormulario["selectVocal"]}','{$DatosFormulario["selectVocal2"]}','{$DatosFormulario["selectSuplente"]}')";
$consulta = BDConexion::getInstancia()->query($query);
$ColeccionTribunal = new ColeccionTribunal();
foreach ($ColeccionTribunal->getTribunales() as $Tribunal) {
  if ($DatosFormulario ["selectPresidente"] == $Tribunal->getPresidente() && $DatosFormulario ["selectVocal"] == $Tribunal->getVocal() && $DatosFormulario ["selectVocal2"] == $Tribunal->getVocal1() && $DatosFormulario ["selectSuplente"] == $Tribunal->getSuplente() )
  {
    $id=$Tribunal->getId();
  }
}


$query2 = "INSERT INTO mesa_examen VALUES (null,'$id','{$DatosFormulario["selectAsignatura"]}','{$DatosFormulario["orden"]}')";
$consulta2 = BDConexion::getInstancia()->query($query2);
$ColeccionMesaExamenes = new ColeccionMesaExamen();
foreach ($ColeccionMesaExamenes->getMesas() as $MesaExamen) {
  if ($DatosFormulario ["selectAsignatura"] == $MesaExamen->getIdAsignatura() && $DatosFormulario ["orden"] == $MesaExamen->getOrden() && $id == $MesaExamen->getIdtribunal())
  {
    $idmesa=$MesaExamen->getId();
  }
}
$query3 = "INSERT INTO mesa_examen_carrera VALUES ('$idmesa','{$DatosFormulario["selectCarrera"]}')";
$consulta3 = BDConexion::getInstancia()->query($query3);
for ($i=2; $i <= 5 ; $i++) {
  $query4 = "INSERT INTO llamado_mesa_examen VALUES ('$i','$idmesa','{$DatosFormulario["hora"]}',Null)";
  $consulta4 = BDConexion::getInstancia()->query($query4);
}


//if (!$consulta && !$consulta2) {
//    BDConexion::getInstancia()->rollback();
    //arrojar una excepcion
//    die(BDConexion::getInstancia()->errno);
//}
?>
<html>
    <head>
        <meta charset="UTF-8">
        <link rel="stylesheet" href="../lib/bootstrap-4.1.1-dist/css/bootstrap.css" />
        <link rel="stylesheet" href="../lib/open-iconic-master/font/css/open-iconic-bootstrap.css" />
        <script type="text/javascript" src="../lib/JQuery/jquery-3.3.1.js"></script>
        <script type="text/javascript" src="../lib/bootstrap-4.1.1-dist/js/bootstrap.min.js"></script>
        <title><?= Constantes::NOMBRE_SISTEMA; ?> - Crear Examen</title>
    </head>
    <body>
      <?php echo $idmesa ?>
        <?php include_once '../gui/navbar.php'; ?>
        <div class="container">
            <p></p>
            <div class="card">
                <div class="card-header">
                    <h3>Crear Examen</h3>
                </div>
                <div class="card-body">
                    <?php if ($consulta && $consulta2) { ?>
                        <div class="alert alert-success" role="alert">
                            Operaci&oacute;n realizada con &eacute;xito.
                        </div>
                    <?php } ?>
                    <?php if (!$consulta && !$consulta2) { ?>
                        <div class="alert alert-danger" role="alert">
                            Ha ocurrido un error.
                        </div>
                    <?php } ?>
                    <hr />
                    <h5 class="card-text">Opciones</h5>
                    <a href="gestionExamen.php">
                        <button type="button" class="btn btn-primary">
                            <span class="oi oi-account-logout"></span> Salir
                        </button>
                    </a>
                </div>
            </div>
        </div>
        <?php include_once '../gui/footer.php'; ?>
    </body>
</html>
