<?php
include_once '../lib/ControlAcceso.Class.php';
ControlAcceso::requierePermiso(PermisosSistema::PERMISO_USUARIOS);
include_once '../modelo/BDConexion.Class.php';
$DatosFormulario = $_POST;
$idLlamado = $DatosFormulario["idLlamado"];
$idMesa = $DatosFormulario["idMesa"];
$TIPO = $DatosFormulario["tipoLlamado"];

$fechainicio=strrev($DatosFormulario["fechainicio"]);

if($TIPO == "general"){
$fechafinal=strrev($DatosFormulario["fechainicio"]);
}
$fecha = new DateTime($DatosFormulario["fechainicio"]);
$fecha_d_m_y1 = $fecha->format('Y/m/d');

if($TIPO == "general"){
$fecha = new DateTime($DatosFormulario["fechafinal"]);
$fecha_d_m_y2 = $fecha->format('Y/m/d');
}

$hora = $DatosFormulario['Hora'];

if($TIPO == "general"){
$query = "UPDATE LLAMADO_MESA_EXAMEN SET fechaUnica = '{$fecha_d_m_y1}',fechaUnica1 = '{$fecha_d_m_y2}' WHERE idLlamado = {$idLlamado} AND idMesa = {$idMesa}";
$consulta = BDConexion::getInstancia()->query($query);
}
    $query = "UPDATE LLAMADO_MESA_EXAMEN SET fechaUnica = '{$fecha_d_m_y1}' WHERE idLlamado = {$idLlamado} AND idMesa = {$idMesa}";
    $consulta = BDConexion::getInstancia()->query($query);

$query2 = "UPDATE FECHA SET hora = '{$hora}' WHERE idLlamado = {$idLlamado} AND idMesa = {$idMesa}";
$consulta2 = BDConexion::getInstancia()->query($query2);
if (!$consulta && !$consulta2 ) {
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
        <title><?= Constantes::NOMBRE_SISTEMA; ?> - Actualizar Mesa de Examen</title>
    </head>
    <body>
        <?php include_once '../gui/navbar.php'; ?>

        <div class="container">
            <div class="card">
                <div class="card-header">
                    <h3>Actualizar Examen</h3>
                </div>
                <div class="card-body">
                    <?php if ($consulta) { ?>
                        <div class="alert alert-success" role="alert">
                            Operaci&oacute;n realizada con &eacute;xito.
                        </div>
                    <?php } ?>
                    <?php if (!$consulta) { ?>
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
