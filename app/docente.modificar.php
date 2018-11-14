<?php
include_once '../lib/ControlAcceso.Class.php';
ControlAcceso::requierePermiso(PermisosSistema::PERMISO_USUARIOS);
include_once '../modelo/ColeccionDocentes.php';
include_once '../modelo/ColeccionCargo.php';
$id=$_GET["id"];
$id1=$_GET["id1"];
$Docente = new Docente($id);
$Cargo = new Cargo($id1);
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
            <form action="docente.modificar.procesar.php" method="post">
                <div class="card">
                    <div class="card-header">
                        <h3>Actualizar Docente</h3>
                        <p>
                            Complete los campos que desea modificar.
                            Luego, presione el bot&oacute;n <b>Confirmar</b>.<br />
                            Si desea cancelar, presione el bot&oacute;n <b>Cancelar</b>.
                        </p>
                    </div>
                    <div class="card-body">
                        <div class="form-group">
                            <label for="inputNombre">Nombre</label>
                            <input type="text" name="nombre" class="form-control" id="inputNombre" value="<?= $Docente->getNombre(); ?>" placeholder="Ingrese el nombre del usuario" required="">
                        </div>
                        <div class="form-group">
                            <label for="inputApellido">Apellido</label>
                            <input type="text" name="apellido" class="form-control" id="inputApellido" value="<?= $Docente->getApellido(); ?>" placeholder="Ingrese el nombre del usuario" required="">
                        </div>
                        <div class="form-group">
                            <label for="inputDni">Dni</label>
                            <input type="text" name="dni" class="form-control" id="inputDni" value="<?= $Docente->getDni(); ?>" placeholder="Ingrese el nombre del usuario" required="">
                        </div>
                        <div class="form-group">
                            <label for="inputEmail">Email</label>
                            <input type="email" name="email" class="form-control" id="inputEmail" value="<?= $Docente->getEmail() ?>" placeholder="Ingrese el email del usuario" required="">
                        </div>
                        <div class="form-group">
                            <label for="inputCategoria">Categoria</label>
                            <input type="text" name="categoria" class="form-control" id="inputCategoria" value="<?= $Docente->getCategoria() ?>" placeholder="Ingrese el email del usuario" required="">
                        </div>
                        <div class "form-group">
                            <label for="Cargon">Cargo</label>
                          <select  class="form-control form-control" name="cargo">
                            <option value="Titular">Titular</option>
                            <option value="Asociado">Asociado</option>
                            <option value="Adjunto">Adjunto</option>
                          </select>
                        </div>
                        <div class "form-group">
                          <label for"Dedicacion">Dedicacion</label>
                          <select  class="form-control form-control" name="dedicacion">
                            <option value="Exclusiva">Exclusiva</option>
                            <option value="TiempoCompleto">Tiempo Completo</option>
                            <option value="Semidedicacoin">Semidedicacion</option>
                            <option value="Simple">Simple</option>
                          </select>
                        </div>
                        <div class="form-group">
                            <label for="inputDepartamento">Departamento</label>
                            <select  class="form-control form-control" name="departamento">
                              <option value="1">Exactas/Naturales</option>
                              <option value="2">Sociales</option>
                            </select>
                        </div>
                    <input type="hidden" name="id" class="form-control" id="id" value="<?= $Docente->getId(); ?>" >
                    <input type="hidden" name="id1" class="form-control" id="id1" value="<?= $Cargo->getId(); ?>" >
                      </div>
                      <div class="class-footer">
                          <button type="submit" class="btn btn-outline-success">
                              <span class="oi oi-check"></span>
                              Confirmar
                          </button>
                          <a href="docente.php">
                              <button type="button" class="btn btn-outline-danger">
                                  <span class="oi oi-x"></span>
                                  Cancelar
                              </button>
                          </a>
                      </div>
                </div>
            </form>
        </div>
          <?php include_once '../gui/footer.php'; ?>
    </body>
</html>
