<?php
include_once '../lib/ControlAcceso.Class.php';
ControlAcceso::requierePermiso(PermisosSistema::PERMISO_USUARIOS);
include_once '../modelo/ColeccionDocentes.php';
include_once '../modelo/ColeccionAsignaturas.php';
include_once '../modelo/ColeccionLlamado.php';
include_once '../modelo/ColeccionCarrera.php';

$ColeccionDocente = new ColeccionDocentes();
$ColeccionAsignatura = new ColeccionAsignaturas();
$ColeccionLlamado = new ColeccionLlamado();
$ColeccionCarrera = new ColeccionCarrera();


?>
<html>
    <head>
        <meta charset="UTF-8">
        <link rel="stylesheet" href="../lib/bootstrap-4.1.1-dist/css/bootstrap.css" />
        <link rel="stylesheet" href="../lib/open-iconic-master/font/css/open-iconic-bootstrap.css" />
        <link rel="stylesheet" href="../lib/bootstrap-4.1.1-dist/css/uargflow_footer.css" />
        <script type="text/javascript" src="../lib/JQuery/jquery-3.3.1.js"></script>
        <script type="text/javascript" src="../lib/bootstrap-4.1.1-dist/js/bootstrap.min.js"></script>
        <script type="text/javascript" src="../lib/validar.js"></script>
        <title><?= Constantes::NOMBRE_SISTEMA; ?> - Crear Examen</title>
    </head>
    <body>
        <?php include_once '../gui/navbar.php'; ?>
        <div class="container">
            <form action="examen.crear.procesar.php" method="post">
                <div class="card">
                    <div class="card-header">
                        <h3>Nuevo Examen</h3>
                        <p>
                            Complete los campos a continuaci&oacute;n.
                            Luego, presione el bot&oacute;n <b>Confirmar</b>.<br />
                            Si desea cancelar, presione el bot&oacute;n <b>Cancelar</b>.
                        </p>
                    </div>
                    <div class="card-body">
                        <h4>Datos de la Nueva Mesa</h4>
                        <div class="form-row">
                             <label for="selectTipoBusqueda">Seleccione Carrera</label>
                             <select class="form-control" name="selectCarrera">
                             <?php foreach ($ColeccionCarrera->getCarrera() as $Carrera) {

                                echo '<option value="'.$Carrera->getId().'">'.$Carrera->getNombre().'</option>';
                            }
                            ?>
                            </select>
                        </div>
                        <div class="form-row">
                             <label for="selectTipoBusqueda">Seleccione Asignatura</label>
                             <select class="form-control" name="selectAsignatura">
                             <?php foreach ($ColeccionAsignatura->getAsignaturas() as $Asignatura) {

                                echo '<option value="'.$Asignatura->getId().'">'.$Asignatura->getNombre().'</option>';
                            }
                            ?>
                            </select>
                        </div>


                        <div class="form-row">
                             <label for="selectTipoBusqueda">Seleccione Docente Presidente de Mesa</label>
                             <select class="form-control" name="selectPresidente">
                             <?php foreach ($ColeccionDocente->getDocentes() as $Docente) {
                                echo '<option value="'.$Docente->getId().'">'.$Docente->getNombre().'</option>';
                            }
                            ?>
                            </select>
                        </div>
                        <div class="form-row">
                             <label for="selectTipoBusqueda">Seleccione Docente Vocal</label>
                             <select class="form-control" name="selectVocal">
                             <?php foreach ($ColeccionDocente->getDocentes() as $Docente) {
                                echo '<option value="'.$Docente->getId().'">'.$Docente->getNombre().'</option>';
                            }
                            ?>
                            </select>
                        </div>
                        <div class="form-row">
                             <label for="selectTipoBusqueda">Seleccione Docente Vocal 2</label>
                             <select class="form-control" name="selectVocal2">
                             <?php foreach ($ColeccionDocente->getDocentes() as $Docente) {
                                echo '<option value="'.$Docente->getId().'">'.$Docente->getNombre().'</option>';
                            }
                            ?>
                            </select>
                        </div>
                        <div class="form-row">
                             <label for="selectTipoBusqueda">Seleccione Docente Suplente</label>
                             <select class="form-control" name="selectSuplente">
                               <option value="">Sin suplente </option>;
                             <?php foreach ($ColeccionDocente->getDocentes() as $Docente) {

                                echo '<option value="'.$Docente->getId().'">'.$Docente->getNombre().'</option>';
                            }
                            ?>
                            </select>
                        </div>





                        <div class "form-group">
                            <label for="habil">Dia Habil</label>
                          <select  class="form-control " name="orden" >
                            <option value="1">1</option>
                            <option value="2">2</option>
                            <option value="3">3</option>
                            <option value="4">4</option>
                            <option value="5">5</option>
                          </select>
                        </div>
                        <div class="form-group">
                            <label for="inputNombre">Hora</label>
                            <input type="time" name="hora" class="form-control" id="hora"oninput="validar('hora')" placeholder="Ingrese hora" required=""min="13:00" max="21:00">
                        </div>

                    </div>
                    <div class="card-footer">
                        <button type="submit" class="btn btn-outline-success">
                            <span class="oi oi-check"></span> Confirmar
                        </button>
                        <a href="gestionExamen.php">
                            <button type="button" class="btn btn-outline-danger">
                                <span class="oi oi-x"></span> Cancelar
                            </button>
                        </a>
                    </div>
                </div>
            </form>
            <script type="text/javascript" src="../lib/JQuery/jquery-3.3.1.js"></script>
            <script type="text/javascript" src="../lib/bootstrap-4.1.1-dist/js/bootstrap.min.js"></script>
        </div>
        <?php include_once '../gui/footer.php'; ?>
    </body>
</html>
