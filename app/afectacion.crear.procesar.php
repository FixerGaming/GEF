<?php
include_once '../lib/ControlAcceso.Class.php';
ControlAcceso::requierePermiso(PermisosSistema::PERMISO_USUARIOS);
include_once '../modelo/BDConexion.Class.php';
include_once '../modelo/ColeccionLicencia.php';
include_once '../modelo/ColeccionDocentes.php';
include_once '../modelo/ColeccionAsignaturas.php';
include_once '../modelo/ColeccionTribunal.php';
$DatosFormulario = $_POST;
$nombreasignatura=$DatosFormulario["buscarasignatura"];
$presidente=$DatosFormulario["buscarpresidente"];
$vocal=$DatosFormulario["buscarvocal"];
$vocal1=$DatosFormulario["buscarvocal1"];


$ColeccionAsignaturas= new ColeccionAsignaturas();


if (!empty($DatosFormulario["buscarsuplente"]))
{
$suplente=$DatosFormulario["buscarsuplente"]; 

$ColeccionDocentes = new ColeccionDocentes();

foreach ($ColeccionDocentes->getDocentes() as $Docente) {
  if ($presidente== $Docente->getNombre())
  {
    $presidenteid=$Docente->getId();
  }
   if ($vocal== $Docente->getNombre())
  {
    $vocalid=$Docente->getId();
  }
   if ($vocal1== $Docente->getNombre())
  {
    $vocal1id=$Docente->getId();
  }
   if ($suplente== $Docente->getNombre())
  {
    $suplentesid=$Docente->getId();
  }
}



 
$query = "INSERT INTO TRIBUNAL VALUES (null,'".$presidenteid."','".$vocalid."','".$vocal1id."','".$suplentesid."')";
$consulta = BDConexion::getInstancia()->query($query);
$ColeccionTribunal = new ColeccionTribunal();

foreach ($ColeccionTribunal->getTribunales() as $Tribunal) {
  if ($presidenteid == $Tribunal->getPresidente() && $vocalid == $Tribunal->getPresidente() && $suplentesid == $Tribunal->getSuplente())
  {
    $idTribunal=$Tribunal->getId();
  }
}


foreach ($ColeccionAsignaturas->getAsignaturas() as $Asignatura) {
  if ($nombreasignatura == $Asignatura->getNombre())
  {
    $idasignatura=$Asignatura->getId();
  }
}

$query = "INSERT INTO tribunalasignaturas VALUES (null,'".$idTribunal."','".$idasignatura."')";
$consulta2 = BDConexion::getInstancia()->query($query);
}
else
{

$query = "INSERT INTO tribunal VALUES (null,'{$DatosFormulario["buscarpresidente"]}','{$DatosFormulario["buscarVocal"]}','{$DatosFormulario["vocal1"]}',null)";
$consulta = BDConexion::getInstancia()->query($query);
$ColeccionTribunal=new ColeccionTribunal();
foreach ($ColeccionTribunal->getTribunales() as $Tribunal) {
  if ($DatosFormulario["buscarpresidente"] == $Tribunal->getPresidente() && $DatosFormulario["buscarVocal"] == $Tribunal->getPresidente() && $DatosFormulario["buscarvocal1"] == $Tribunal->getVocal1())
  {
    $idTribunal=$Tribunal->getId();
  }
}


foreach ($ColeccionAsigaturas->getAsignatura() as $Asignatura) {
  if ($nombreasignatura == $Asignatura->getNombre())
  {
    $idasignatura=$Asignatura->getId();
  }
}

$query = "INSERT INTO tribunal_has_asignatura VALUES (null,'".$idTribunal."','".$idasignatura."')";
$consulta2 = BDConexion::getInstancia()->query($query);


}







if (!$consulta && !$consulta2) {
    BDConexion::getInstancia()->rollback();
    //arrojar una excepcion
    die(BDConexion::getInstancia()->errno);
}
?>
<html>
    <head>
        <meta charset="UTF-8">
        <link rel="stylesheet" href="../lib/bootstrap-4.1.1-dist/css/bootstrap.css" />
        <link rel="stylesheet" href="../lib/open-iconic-master/font/css/open-iconic-bootstrap.css" />
        <script type="text/javascript" src="../lib/JQuery/jquery-3.3.1.js"></script>
        <script type="text/javascript" src="../lib/bootstrap-4.1.1-dist/js/bootstrap.min.js"></script>
        <title><?= Constantes::NOMBRE_SISTEMA; ?> - Crear Novedad</title>
    </head>
    <body>
        <?php include_once '../gui/navbar.php'; ?>
        <div class="container">
            <p></p>
            <div class="card">
                <div class="card-header">
                    <h3>Crear Novedad</h3>
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
                    <a href="gestionarAfectacion.php">
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
