<?php
include_once '../lib/ControlAcceso.Class.php';
ControlAcceso::requierePermiso(PermisosSistema::PERMISO_USUARIOS);
include_once '../modelo/BDConexion.Class.php';
$DatosFormulario = $_POST;
$idProfesor = $DatosFormulario["id"];
$idCargo = $DatosFormulario["id1"];

$query = "UPDATE profesor SET dni = '{$DatosFormulario["dni"]}',nombre = '{$DatosFormulario["nombre"]}', apellido = '{$DatosFormulario["apellido"]}', email = '{$DatosFormulario["email"]}', categoria = '{$DatosFormulario["categoria"]}' WHERE id = {$idProfesor}";
$consulta = BDConexion::getInstancia()->query($query);
$query2 = "UPDATE cargo SET tipoDedicacion = '{$DatosFormulario["dedicacion"]}',tipoCargo = '{$DatosFormulario["cargo"]}' WHERE idProfesorcarg = {$idProfesor}";
$consulta2 = BDConexion::getInstancia()->query($query2);



if (!$consulta && !$consulta2)
{
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
        <title><?= Constantes::NOMBRE_SISTEMA; ?> - Actualizar Docente</title>
    </head>
    <body>
        <?php include_once '../gui/navbar.php'; ?>

        <div class="container">
            <div class="card">
                <div class="card-header">
                    <h3>Actualizar Docente</h3>
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
                    <a href="docente.php">
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
