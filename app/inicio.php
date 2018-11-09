<?php
include_once '../lib/ControlAcceso.Class.php';
ControlAcceso::requierePermiso(PermisosSistema::PERMISO_USUARIOS);
include_once '../modelo/ColeccionUsuarios.php';
$ColeccionUsuarios = new ColeccionUsuarios();
?>

<html>
    <head>
        <meta charset="UTF-8">
        <link rel="stylesheet" href="../lib/bootstrap-4.1.1-dist/css/bootstrap.css" />
        <link rel="stylesheet" href="../lib/open-iconic-master/font/css/open-iconic-bootstrap.css" />
        <script type="text/javascript" src="../lib/JQuery/jquery-3.3.1.js"></script>
        <script type="text/javascript" src="../lib/bootstrap-4.1.1-dist/js/bootstrap.min.js"></script>        
        <title><?= Constantes::NOMBRE_SISTEMA; ?> - Inicio</title>
    </head>
    <body>

        <?php include_once '../gui/navbar.php'; ?>

<div class="container-fluid">
<form method="post" action="reporte.php" align="center">  
                     <input type="submit" name="reporte" value="CSV Export" class="btn btn-success" />  
                </form>  
    <div class="container">
        <div class="row justify-content-around">
          <div class=" col-lg-3">
                <div class="card">
                    <div class="card-header alert-info">
                        B&uacute;squeda Avanzada
                    </div>
                    <div class="card-body">

                    </div>
                </div>
            </div>
            <div class="   col-lg-9">
                <div class="card">
                   <div class="card-header alert-success">
                   <span class="card-title">Listado de Examenes</span>
                    </div>
                    <div class="card-body">

                    </div>
                </div>
            </div>
        </div>    
    </div>
        </div>
        
</div>
        <?php include_once '../gui/footer.php'; ?>
    </body>
</html>

