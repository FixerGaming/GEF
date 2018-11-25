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
        <link rel="stylesheet" href="../lib/calendar/bootstrap-datepicker.css">
        <link rel="stylesheet" href="../lib/calendar/bootstrap-datepicker.standalone.css">
        <link rel="stylesheet" href="../lib/calendar/bootstrap-datepicker.min.css">
        <link rel="stylesheet" href="../lib/calendar/bootstrap-datepicker.standalone.min.css">
        <link rel="stylesheet" href="../lib/calendar/bootstrap-datepicke3.css">
        <link rel="stylesheet" href="../lib/calendar/bootstrap-datepicke3.min.css">
        <link rel="stylesheet" href="../lib/calendar/bootstrap-datepicke3.standalone.css">
        <link rel="stylesheet" href="../lib/calendar/bootstrap-datepicke3.standalone.min.css">

        <title><?= Constantes::NOMBRE_SISTEMA; ?> - Gestion de Mesa de Examen</title>
    </head>
    <body>
<?php include_once '../gui/navbar.php'; ?>

<!-- Se pasa el id del llamado de la pagina Llamado por medio de un formulario y se guarda en la variable $Mesa-->
<?php @$Mesa=$_POST['NombreMesa']; 

    //Consulta a la Base de Datos para recuperar el ID, Tipo y nombre del LLAMADO
    $Consulta="SELECT L.id AS identifica, L.tipo AS tipo, L.nombre AS nombre FROM LLAMADO L WHERE L.id LIKE '%".$Mesa."%'";
    $Consultas=BDConexion::getInstancia()->query($Consulta);
    $row = $Consultas->fetch_assoc();
    $Llamado = new Llamado($row['identifica']);
    $Llamado->setTipo($row['tipo']);
    $Llamado->setId($row['identifica']);
    $Llamado->setNombre($row['nombre']);
  
    //Si se aprieta el Boton "Calendario" se recarga la pagina y cuando llega al if si esta apretado entra, en el caso deque no lo salta y no se realiza ninguna operacion

?>
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
                        <span class="card-title">Ingreso de Fecha</span>
                    </div>
                    <div class="card-body">
                        <!-- Formulario que nos permite generar el Calendario -->
                        <form action="calendarioFuncion.php" method="POST">
                            <div class="container">
                                <h3 align="center">Mesa Elegida: <?php echo $Llamado->getNombre();?></h3>
	                            <div class="card-body date" align="center">
                                    <!-- input que Obtiene la informacion del calendario, este input es lo que vamos a enviar en el post--> 
                                    <input type="hidden" name="fecha" class="form-control date">
                                </div>
                                <input type="hidden"  name="Mesa" value=<?php echo $Llamado->getId();?>>
                                <div align="center">
                                    <button  type="submit"  name="calendario" class="btn btn-outline-info">
                                        <span  class="oi oi-check"></span> GUARDAR
                                    </button>    
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
        
        
        <script src="../lib/calendar/bootstrap-datepicker.js"></script>
        <script src="../lib/calendar/bootstrap-datepicker.es.min.js"></script>
        <script src="../lib/calendar/script.js"></script>
        
        
    </body>
</html>

