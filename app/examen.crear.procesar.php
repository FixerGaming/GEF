<?php
include_once '../lib/ControlAcceso.Class.php';
ControlAcceso::requierePermiso(PermisosSistema::PERMISO_USUARIOS);
include_once '../modelo/BDConexion.Class.php';
include_once '../modelo/ColeccionTribunal.php';
include_once '../modelo/ColeccionMesaExamen.php';
include_once '../modelo/Llamado.Class.php';

error_reporting(E_ERROR | E_PARSE);

@$MesaExamen= $_SESSION['llamado'];
//Consulta a la Base de Datos para recuperar el ID, Tipo y nombre del LLAMADO
$Consulta="SELECT L.id AS identifica, L.tipo AS tipo, L.nombre AS nombre FROM LLAMADO L WHERE L.id LIKE '%".$MesaExamen."%'";
$Consultas=BDConexion::getInstancia()->query($Consulta);
$row = $Consultas->fetch_assoc();
$Llamado = new Llamado($row['identifica']);
$Llamado->setTipo($row['tipo']);
$Llamado->setId($row['identifica']);
$Llamado->setNombre($row['nombre']);
$Nombre= $Llamado->getNombre();
$ID=$Llamado->getId();
$TIPO= $Llamado->getTipo();

$DatosFormulario = $_POST;
$query = "SELECT  A.id AS asignatura, T.id AS tribunal
FROM ASIGNATURA  A 
INNER JOIN tribunalasignaturas TA ON A.id = TA.ASIGNATURA_id
INNER JOIN TRIBUNAL T ON T.id = TA.TRIBUNAL_id
where A.nombre ='{$DatosFormulario["buscarAsignatura"]}'";

        $result = BDConexion::getInstancia()->query($query);
        $row = $result->fetch_array();
        $Asignatura=$row["asignatura"]; 
        $Tribunal=$row["tribunal"]; 
      
$query2 = "INSERT INTO mesa_examen VALUES (null,'$Tribunal','$Asignatura','{$DatosFormulario["orden"]}')";
$consulta2 = BDConexion::getInstancia()->query($query2);

$query5 = "SELECT M.id AS mesa
FROM MESA_EXAMEN M
INNER JOIN ASIGNATURA  A ON A.id=M.codAsignatura
INNER JOIN TRIBUNAL T ON T.id = M.idTribunal
";
      
        $result1 = BDConexion::getInstancia()->query($query5);
        WHILE($row = $result1->fetch_array()){
            $array= array($row["mesa"]);
            array_push($array);
        }

      $Mesa= end($array);


$query3 = "INSERT INTO mesa_examen_carrera VALUES (NULL,'$Mesa','{$DatosFormulario["selectCarrera"]}')";
$consulta3 = BDConexion::getInstancia()->query($query3);

$query4 = "INSERT INTO llamado_mesa_examen VALUES (NULL,'$ID','$Mesa','{$DatosFormulario["hora"]}',NULL,NULL)";
$consulta4 = BDConexion::getInstancia()->query($query4);



if (!$consulta && !$consulta2) {
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
        <title><?= Constantes::NOMBRE_SISTEMA; ?> - Crear Examen</title>
    </head>
    <body>
        <?php include_once '../gui/navbar.php'; ?>
        <div class="container">
            <p></p>
            <div class="card">
                <div class="card-header">
                    <h3>Crear Examen</h3>
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
                    <a href="gestionExamen.php">
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
