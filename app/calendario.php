<?php

include_once '../lib/ControlAcceso.Class.php';
ControlAcceso::requierePermiso(PermisosSistema::PERMISO_USUARIOS);
include_once '../modelo/ColeccionLlamado.php';
$ColeccionLlamado = new ColeccionLlamado();
?>

<html>
    <head>
        <!--  Scripts / Links necesarios Pertenecientes al Bootstrap y al Calendario-->
        <meta charset="UTF-8">
        <link rel="stylesheet" href="../lib/bootstrap-4.1.1-dist/css/bootstrap.css" />
        <link rel="stylesheet" href="../lib/open-iconic-master/font/css/open-iconic-bootstrap.css" />
        <script type="text/javascript" src="../lib/JQuery/jquery-3.3.1.js"></script>
        <script type="text/javascript" src="../lib/bootstrap-4.1.1-dist/js/bootstrap.min.js"></script>
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
        <script src="https://cdn.jsdelivr.net/npm/gijgo@1.9.10/js/gijgo.min.js" type="text/javascript"></script>
        <link href="https://cdn.jsdelivr.net/npm/gijgo@1.9.10/css/gijgo.min.css" rel="stylesheet" type="text/css" />
        <link rel="stylesheet" href="../lib/calendar/style.css">
        <title><?= Constantes::NOMBRE_SISTEMA; ?> - Gestion de Mesa de Examen</title>
    </head>
    <body>
<?php include_once '../gui/navbar.php'; ?>

<!-- Se pasa el id del llamado de la pagina Llamado por medio de un formulario y se guarda en la variable $Mesa-->
<?php @$Mesa=$_POST['NombreMesa']; ?>

<div class="container-fluid "> 
    <div class="container-fluid">
        <div class="row justify-content-around">
          <div class=" col-sm-3">
                <div class="card">
                    <div class="card-header alert-info">
                        Seleccion Mes Llamado
                    </div>  
                    <div class="card-body">
                        
                    </div>
                </div>
            </div>
            <div class="col-md-9">
                <div class="card">
                    <div class="card-header alert-success">
                        <span class="card-title">Listado de Examenes</span>
                    </div>
                    <div class="card-body">
                        <form action="calendarioFuncion.php" method="POST">
                            <div class="container">
                                <h3></h3>
                                <input type="hidden" />
	                            <input type="text"  name="fecha" class="form-control date" placeholder="Pick the multiple dates"  >
                                <div class="card">
                                    <input class="btn btn-primary" type="button" value="Input">
                                </div>
                            </div>
                        </form>
                    </div>
                </div>   
            </div>
        </div>    
        <br>
    </div>
</div>
        <?php include_once '../gui/footer.php'; ?>
        <!-- SCRIPTS Necesarios para el funcionamiento del Calendario -->
        <script src='http://cdnjs.cloudflare.com/ajax/libs/jquery/2.1.3/jquery.min.js'></script>
        <script src='https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.3.0/js/bootstrap-datepicker.js'></script>
        <script  src="../lib/calendar/script.js"></script>
    </body>
</html>

