<?php
include_once '../lib/ControlAcceso.Class.php';
ControlAcceso::requierePermiso(PermisosSistema::PERMISO_USUARIOS);
include_once '../modelo/BDConexion.Class.php';
$DatosFormulario = $_POST;
$idLlamado = $DatosFormulario["idLlamado"];
$idMesa = $DatosFormulario["idMesa"];
$tribunal = $DatosFormulario["tribunal"];
$presidente = $DatosFormulario['Presidente'];
$vocal1 = $DatosFormulario['vocal1'];
$vocal2 = $DatosFormulario['vocal2'];
$suplente = $DatosFormulario['Suplente'];
$hora = $DatosFormulario['Hora'];

$ConsultaPresidente= "SELECT P.id AS id FROM PROFESOR P WHERE P.nombre LIKE '%".$presidente."%'";
$ConsultasPresidente= BDConexion::getInstancia()->query($ConsultaPresidente);
$row1= $ConsultasPresidente->fetch_assoc();
$ConsultaVocal1= "SELECT P.id AS id FROM PROFESOR P WHERE P.nombre = '".$vocal1."'";
$ConsultasVocal1= BDConexion::getInstancia()->query($ConsultaVocal1);
$row2= $ConsultasVocal1->fetch_assoc();
$ConsultaVocal2= "SELECT P.id  AS id FROM PROFESOR P WHERE P.nombre = '".$vocal2."'";
$ConsultasVocal2= BDConexion::getInstancia()->query($ConsultaVocal2);
$row3= $ConsultasVocal2->fetch_assoc();
$ConsultaSuplente= "SELECT P.id AS id FROM PROFESOR P WHERE P.nombre = '".$suplente."'";
$ConsultasSuplente= BDConexion::getInstancia()->query($ConsultaSuplente);
$row4= $ConsultasSuplente->fetch_assoc();



if($ConsultasPresidente->num_rows > 0){
    $existePresidente = "presidente = '{$row1["id"]}'";
}
if($ConsultasVocal1->num_rows > 0){
    $existeVocal1 = "vocal = '{$row2["id"]}'";
}
if($ConsultasVocal2->num_rows > 0){
    $existeVocal2 = "vocal1 = '{$row3["id"]}'";
}
if($ConsultasSuplente->num_rows > 0){
    $existeSuplente = "suplente = '{$row4["id"]}'";
}
$query = "UPDATE TRIBUNAL SET $existePresidente,$existeVocal1,$existeVocal2,$existeSuplente WHERE id = {$tribunal}";
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
