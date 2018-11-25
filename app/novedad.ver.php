<?php
include_once '../lib/ControlAcceso.Class.php';
ControlAcceso::requierePermiso(PermisosSistema::PERMISO_USUARIOS);
include_once '../modelo/ColeccionLicencia.php';
include_once '../modelo/ColeccionTipoLicencia.php';
include_once '../modelo/ColeccionDocentes.php';
include_once '../modelo/ColeccionDepartamento.php';

$Licencia = new Licencia($_GET["id"]);
$TipoLicencia = new TipoLicencia($_GET["id1"]);
$Docente = new Docente($_GET["id3"]);
$fecha = new DateTime($Licencia->getFechaInicio());
$fecha_d_m_y1 = $fecha->format('d-m-Y');
$fecha = new DateTime($Licencia->getFechaFinal());
$fecha_d_m_y2 = $fecha->format('d-m-Y');
$Departamento = new Departamento($Docente->getIdDepartamento());
?>
<html>
    <head>
        <meta charset="UTF-8">
        <link rel="stylesheet" href="../lib/bootstrap-4.1.1-dist/css/bootstrap.css" />
        <link rel="stylesheet" href="../lib/open-iconic-master/font/css/open-iconic-bootstrap.css" />
        <script type="text/javascript" src="../lib/JQuery/jquery-3.3.1.js"></script>
        <script type="text/javascript" src="../lib/bootstrap-4.1.1-dist/js/bootstrap.min.js"></script>
        <title><?= Constantes::NOMBRE_SISTEMA; ?> - Acerca de la Licencia</title>
    </head>
    <body>
        <?php include_once '../gui/navbar.php'; ?>
        <div class="container">
            <p></p>
            <div class="card">
                <div class="card-header">
                    <h3>Datos de la licencia</h3>
                </div>
                <div class="card-body">
                    <h4 class="card-text">Nombre de Docente</h4>
                    <p> <?= $Docente->getNombre(); ?></p>
                    <hr />
                     <h4 class="card-text">Departamento</h4>
                    <p> <?= $Departamento->getNombre(); ?></p>
                    <hr />
                    <h4 class="card-text">Nombre de Licencia</h4>
                    <p> <?= $TipoLicencia->getNombre(); ?></p>
                    <hr />
                     <h4 class="card-text">Fecha de Inicio</h4>
                    <p> <?= $fecha_d_m_y1 ?></p>
                    <hr />
                    <h4 class="card-text">Fecha de Final</h4>
                    <p> <?= $fecha_d_m_y2 ?></p>
                    <hr />
                    <h4 class="card-text">Descripcion</h4>
                    <p> <?= $TipoLicencia->getDescripcion(); ?></p>
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
