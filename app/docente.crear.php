<?php
include_once '../lib/ControlAcceso.Class.php';
ControlAcceso::requierePermiso(PermisosSistema::PERMISO_USUARIOS);
include_once '../modelo/ColeccionRoles.php';
include_once '../modelo/ColeccionDepartamento.php';
$ColeccionDepartamento = new ColeccionDepartamento();
?>
<html>
    <head>
        <meta charset="UTF-8">
        <link rel="stylesheet" href="../lib/bootstrap-4.1.1-dist/css/bootstrap.css" />
        <link rel="stylesheet" href="../lib/open-iconic-master/font/css/open-iconic-bootstrap.css" />
        <script type="text/javascript" src="../lib/JQuery/jquery-3.3.1.js"></script>
        <script type="text/javascript" src="../lib/bootstrap-4.1.1-dist/js/bootstrap.min.js"></script>
        <title><?= Constantes::NOMBRE_SISTEMA; ?> - Crear Docente</title>
    </head>
    <body>
        <?php include_once '../gui/navbar.php'; ?>
        <div class="container">
            <form action="docente.crear.procesar.php" method="post">
                <div class="card">
                    <div class="card-header">
                        <h3>Crear Docente</h3>
                        <p>
                            Complete los campos a continuaci&oacute;n.
                            Luego, presione el bot&oacute;n <b>Confirmar</b>.<br />
                            Si desea cancelar, presione el bot&oacute;n <b>Cancelar</b>.
                        </p>
                    </div>
                    <div class="card-body">
                        <h4>Datos del docente</h4>
                        <div class="form-group">
                            <label for="inputNombre">Nombre</label>
                            <input type="text" name="nombre" class="form-control" id="inputNombre" placeholder="Ingrese el nombre del Docente" required="">
                        </div>
                        <div class="form-group">
                            <label for="inputApellido">Apellido</label>
                            <input type="text" name="apellido" class="form-control" id="inputApellido"  placeholder="Ingrese el apellido del Docente" required="">
                        </div>
                        <div class="form-group">
                            <label for="inputDni">Dni</label>
                            <input type="text" name="dni" class="form-control" id="inputDni"  placeholder="Ingrese el dni del Docente" required="">
                        </div>
                        <div class="form-group">
                            <label for="inputEmail">Email</label>
                            <input type="email" name="email" class="form-control" id="inputEmail"  placeholder="Ingrese el email del Docente" required="">
                        </div>
                        <div class="form-group">
                            <label for="inputCategoria">Categoria</label>
                            <input type="text" name="categoria" class="form-control" id="inputCategoria" placeholder="Ingrese la categoria del Docente" required="">
                        </div>
                        <div class "form-group">
                            <label for="Cargon">Cargo</label>
                          <select  class="form-control " name="cargo" >
                            <option value="Titular">Titular</option>
                            <option value="Asociado">Asociado</option>
                            <option value="Adjunto">Adjunto</option>
                          </select>
                        </div>
                        <div class "form-group">
                          <label for"Dedicacion">Dedicacion</label>
                          <select  class="form-control" name="dedicacion" >
                            <option value="Exclusiva">Exclusiva</option>
                            <option value="TiempoCompleto">Tiempo Completo</option>
                            <option value="Semidedicacoin">Semidedicacion</option>
                            <option value="Simple">Simple</option>
                          </select>
                        </div>
                        <div class="form-row">
                             <label for="selectTipoBusqueda">Seleccione Departamento</label>
                             <select class="form-control" name="selectDepartamento">
                             <?php foreach ($ColeccionDepartamento->getDepartamentos() as $Departamento) {
                                echo '<option value="'.$Departamento->getId().'">'.$Departamento->getNombre().'</option>';
                            }
                            ?>
                            </select>
                        </div>

                    </div>
                    <div class="card-footer">
                        <button type="submit" class="btn btn-outline-success">
                            <span class="oi oi-check"></span> Confirmar
                        </button>
                        <a href="docente.php">
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
