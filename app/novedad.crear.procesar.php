<?php
include_once '../lib/ControlAcceso.Class.php';
ControlAcceso::requierePermiso(PermisosSistema::PERMISO_USUARIOS);
include_once '../modelo/BDConexion.Class.php';
include_once '../modelo/ColeccionLicencia.php';
include_once '../modelo/ColeccionDocentes.php';

$DatosFormulario = $_POST;
$fechainicio=strrev($DatosFormulario["fechainicio"]);
$fechafinal=strrev($DatosFormulario["fechainicio"]);


$fecha = new DateTime($DatosFormulario["fechainicio"]);
$fecha_d_m_y1 = $fecha->format('Y/m/d');
$fecha = new DateTime($DatosFormulario["fechafinal"]);
$fecha_d_m_y2 = $fecha->format('Y/m/d');


$query = "SELECT id FROM profesor where nombre = '{$DatosFormulario["buscarprofesor"]}'";
 $result = BDConexion::getInstancia()->query($query);
while($row = $result->fetch_array())
    {
       $id1=$row["id"];
    }

//DATE_FORMAT('$fechainicio','%Y-%m-%d')




$query = "INSERT INTO Licencia VALUES (null,'$fecha_d_m_y1','$fecha_d_m_y2','".$id1."')";
$consulta = BDConexion::getInstancia()->query($query);
$ColeccionLicencias = new ColeccionLicencia();
foreach ($ColeccionLicencias->getLicencias() as $Licencia) {
  if ($id1 == $Licencia->getIdProfesor())
  {
    $id=$Licencia->getId();
  }
}
$query2 = "INSERT INTO tipo_licencia VALUES (null,'{$DatosFormulario["nombre"]}','{$DatosFormulario["descripcion"]}','$id')";
$consulta2 = BDConexion::getInstancia()->query($query2);

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
                    <a href="Novedades.php">
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
