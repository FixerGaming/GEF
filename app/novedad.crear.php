<?php
include_once '../lib/ControlAcceso.Class.php';
ControlAcceso::requierePermiso(PermisosSistema::PERMISO_USUARIOS);
include_once '../modelo/ColeccionDocentes.php';
include_once '../modelo/ColeccionLicencia.php';
include_once '../modelo/ColeccionTipoLicencia.php';
$ColeccionDocente = new ColeccionDocentes();
?>
<html>
    <head>
        <meta charset="UTF-8">
        <link rel="stylesheet" href="../lib/bootstrap-4.1.1-dist/css/bootstrap.css" />
        <link rel="stylesheet" href="../lib/open-iconic-master/font/css/open-iconic-bootstrap.css" />
        <script type="text/javascript" src="../lib/JQuery/jquery-3.3.1.js"></script>
        <script type="text/javascript" src="../lib/bootstrap-4.1.1-dist/js/bootstrap.min.js"></script>
        <title><?= Constantes::NOMBRE_SISTEMA; ?> - Crear Licencia</title>
    </head>
    <body>
        <?php include_once '../gui/navbar.php'; ?>
        <div class="container">
            <form action="novedad.crear.procesar.php" method="post">
                <div class="card">
                    <div class="card-header">
                        <h3>Nueva Licencia</h3>
                        <p>
                            Complete los campos a continuaci&oacute;n.
                            Luego, presione el bot&oacute;n <b>Confirmar</b>.<br />
                            Si desea cancelar, presione el bot&oacute;n <b>Cancelar</b>.
                        </p>
                    </div>
                    <div class="card-body">
                        <h4>Datos de la licencia</h4>
                        <div class="form-row">
                             <label for="selectTipoBusqueda">Seleccione Docente</label>
                             <select class="form-control" name="selectDocente">
                             <?php foreach ($ColeccionDocente->getDocentes() as $Docente) {
                                echo '<option value="'.$Docente->getId().'">'.$Docente->getNombre().'</option>';
                            }
                            ?>
                            </select>
                        </div>
                        <div class="form-group">
                            <label for="inputFechaInicio">Dia de Inicio</label>
                            <input type="text" name="fechainicio" class="form-control" id="inputFechaInicio"  placeholder="Ingrese la fecha de inicio" required="">
                        </div>
                        <div class="form-group">
                            <label for="inputFechaFinal">Dia de Finalizacion</label>
                            <input type="text" name="fechafinal" class="form-control" id="inputFechaFinal"  placeholder="Ingrese la fecha de finalizacion" required="">
                        </div>
                        <div class="form-group">
                            <label for="inputNombre">Tipo de Licencia</label>
                            <input type="text" name="nombre" class="form-control" id="inputNombre"  placeholder="Ingrese El nombre del tipo de licencia" required="">
                        </div>
                        <div class="form-group">
                            <label for="inputDescripcion">Descripcion</label>
                            <input type="text" name="descripcion" class="form-control" id="inputDescripcion" placeholder="Ingrese Descripcion de la Novedad" required="">
                        </div>


                    </div>
                    <div class="card-footer">
                        <button type="submit" class="btn btn-outline-success">
                            <span class="oi oi-check"></span> Confirmar
                        </button>
                        <a href="Novedades.php">
                            <button type="button" class="btn btn-outline-danger">
                                <span class="oi oi-x"></span> Cancelar
                            </button>
                        </a>
                    </div>
                </div>
            </form>
        </div>
        <?php include_once '../gui/footer.php'; ?>
    </body>
</html>
