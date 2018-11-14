<?php

include_once '../lib/ControlAcceso.Class.php';
ControlAcceso::requierePermiso(PermisosSistema::PERMISO_USUARIOS);
include_once '../modelo/ColeccionLlamado.php';
$ColeccionLlamado = new ColeccionLlamado();
?>

<html>
    <head>
        <meta charset="UTF-8">
        <link rel="stylesheet" href="../lib/bootstrap-4.1.1-dist/css/bootstrap.css" />
        <link rel="stylesheet" href="../lib/open-iconic-master/font/css/open-iconic-bootstrap.css" />
        <script type="text/javascript" src="../lib/JQuery/jquery-3.3.1.js"></script>
        <script type="text/javascript" src="../lib/bootstrap-4.1.1-dist/js/bootstrap.min.js"></script>        
        <title><?= Constantes::NOMBRE_SISTEMA; ?> - Gestion de Mesa de Examen</title>
    </head>
    <body>

        <?php include_once '../gui/navbar.php'; ?>
<div class="container-fluid "> 
    <div class="container-fluid">
        <div class="row justify-content-around">
          <div class=" col-sm-3">
                <div class="card">
                    <div class="card-header alert-info">
                        Seleccion Mes Llamado
                    </div>  
                    <div class="card-body">
                    <?php @$NombreMesa = $_POST['NombreMesa'];?>
                        <!-- se crea el formulario "formulario" para poder enviar el ID del LLAMADO al calendario.php-->
                        <form action="calendario.php" method="POST" name="formulario">
                            <!-- se realiza un select para mostrar los tipos de llamados-->
                            <select class="form-control" name="NombreMesa" >
                                <?php foreach ($ColeccionLlamado->getLlamado() as $Llamado) {?>
                                    <!-- se obtiene por medio del <opcion> el valor del ID de LLAMADO, y por pantalla se muestra el nombre del LLAMADO  -->
                                    <option value="<?php echo $Llamado->getId();?>" <?php if($Llamado->getId()==$NombreMesa) { echo 'selected';} ?> > <?php echo $Llamado->getNombre();?></option>
                                <?php }   ?>
                            </select>
                            <br>
                            <input type="submit"  class="btn btn-outline-danger" name="reporte"  value="Seleccionar" id="">
                        </form>
                    </div>
                </div>
            </div>
            <div class="col-md-9">
                <div class="card">
                    <div class="card-header alert-success">
                        <span class="card-title">Listado de Examenes</span>
                    </div>
                    <div class="card-body">
                    </div>
                </div>   
            </div>
        </div>    
        <br>
    </div>
</div>
        <?php include_once '../gui/footer.php'; ?>
    </body>
</html>

