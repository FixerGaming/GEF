<?php
include_once '../lib/ControlAcceso.Class.php';
ControlAcceso::requierePermiso(PermisosSistema::PERMISO_USUARIOS);
include_once '../modelo/Licencia.Class.php';
include_once '../modelo/TipoLicencia.Class.php';
include_once '../modelo/Docente.Class.php';
$id= $_GET["id"];
$id1= $_GET["llam"];
$id2= $_GET["mes"];
$id3 = $_GET["idasig"];
$asignatura = $_GET["asignatura"];


?>
<html>
    <head>
        <meta charset="UTF-8">
        <link rel="stylesheet" href="../lib/bootstrap-4.1.1-dist/css/bootstrap.css" />
        <link rel="stylesheet" href="../lib/open-iconic-master/font/css/open-iconic-bootstrap.css" />
        <script type="text/javascript" src="../lib/JQuery/jquery-3.3.1.js"></script>
        <script type="text/javascript" src="../lib/bootstrap-4.1.1-dist/js/bootstrap.min.js"></script>
        <title><?php echo Constantes::NOMBRE_SISTEMA; ?> - Eliminar Mesa de Examen</title>
    </head>
    <body>
        <?php include_once '../gui/navbar.php'; ?>
        <div class="container">
            <form action="examen.eliminar.procesar.php" method="post">
                <div class="card">
                    <div class="card-header">
                        <h3>Eliminar Mesa de Examen</h3>
                    </div>
                    <div class="card-body">
                        <p class="alert alert-warning ">
                            <span class="oi oi-warning"></span> ATENCI&Oacute;N. Esta operaci&oacute;n no puede deshacerse.
                        </p>
                        <p>¿Est&aacute; seguro que desea eliminar la mesa de  <b><?= $asignatura ?></b> ?

                    </div>
                    <input type="hidden" name="id" class="form-control" id="id" value="<?= $id ?>">
                    <input type="hidden" name="id1" class="form-control" id="id1" value="<?= $id1 ?>">
                    <input type="hidden" name="id2" class="form-control" id="id2" value="<?= $id2 ?>">
                    <input type="hidden" name="id3" class="form-control" id="id3" value="<?= $id3 ?>">
                    <div class="card-footer">
                        <button type="submit" class="btn btn-outline-success">
                            <span class="oi oi-check"></span> Sí, deseo eliminar
                        </button>
                        <a href="gestionExamen.php">
                            <button type="button" class="btn btn-outline-danger">
                                <span class="oi oi-x"></span> NO (Salir de esta pantalla)
                            </button>
                        </a>
                    </div>
                </div>
            </form>
        </div>
        <?php include_once '../gui/footer.php'; ?>
    </body>
</html>