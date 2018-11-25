<?php
include_once '../lib/ControlAcceso.Class.php';
ControlAcceso::requierePermiso(PermisosSistema::PERMISO_USUARIOS);
include_once  '../modelo/ColeccionMesaExamen.php';
include_once  '../modelo/ColeccionTribunal.php';
include_once  '../modelo/ColeccionAsignaturas.php';
include_once  '../modelo/ColeccionDocentes.php';
$Asignatura = new Asignatura($_GET["id"]);
$Tribunal = new Tribunal($_GET["id1"]);
$MesaExamen = new MesaExamen($_GET["id2"]);

$idtitular= $Tribunal->getPresidente();
$idvocal= $Tribunal->getVocal();
$idvocal1= $Tribunal->getVocal1();
$idsuplente= $Tribunal->getSuplente();
$titular = new Docente($idtitular);
$vocal = new Docente($idvocal);
$vocal1 = new Docente($idvocal);
$suplente = new Docente($idsuplente);



?>
<html>
    <head>
        <meta charset="UTF-8">
        <link rel="stylesheet" href="../lib/bootstrap-4.1.1-dist/css/bootstrap.css" />
        <link rel="stylesheet" href="../lib/open-iconic-master/font/css/open-iconic-bootstrap.css" />
        <script type="text/javascript" src="../lib/JQuery/jquery-3.3.1.js"></script>
        <script type="text/javascript" src="../lib/bootstrap-4.1.1-dist/js/bootstrap.min.js"></script>
        <title><?= Constantes::NOMBRE_SISTEMA; ?> - Acerca del Tribunal</title>
    </head>
    <body>
        <?php include_once '../gui/navbar.php'; ?>
        <div class="container">
            <p></p>
            <div class="card">
                <div class="card-header">
                    <h3>Datos del Tribunal</h3>
                </div>
                <div class="card-body">
                      <h4 class="card-text">Asignatura</h4>
                    <p> <?= $Asignatura->getNombre(); ?></p>
                    <hr />
                      <h4 class="card-text">Presidente</h4>
                    <p> <?= $titular->getNombre(); ?></p>
                    <hr />
                    <h4 class="card-text">Vocal</h4>
                    <p> <?= $vocal->getNombre(); ?></p>
                    <hr />
                    <h4 class="card-text">Vocal 2</h4>
                        <p> <?= $vocal1->getNombre(); ?> </p>
                    <hr />
                    <h4 class="card-text">Suplente</h4>
                        <p> <?= $suplente->getNombre(); ?> </p>
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
