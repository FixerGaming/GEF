<?
//CONEXION A LA BASE DE DATOS
include_once '../modelo/BDConexion.Class.php';

if(isset($_POST['reporte'])){
    //nombre del archivo
    header('Content-Type: text/csv; charset=utf-8');  
    header('Content-Disposition: attachment; filename=data.csv');

    //Salida del Archivo
    $output = fopen("php://output", "w");

    //Consulta a la Base de Datos
    $reporte="SELECT ME.`id`,ME.`nombre1`,LM.`nombre`, F.`fecha1`, F.`fecha2`,LM.`hora`
    FROM FECHA F JOIN LLAMADO L ON F.`LLAMADO_id`=L.`id`, (SELECT LM.`hora`, LM.`fechaUnica`, M.`orden`,LM.`idLlamado`,A.`nombre`,M.`id`, M.`idTribunal`
                                                                                                              FROM LLAMADO_MESA_EXAMEN LM JOIN MESA_EXAMEN M JOIN ASIGNATURA A
                                                                                                              WHERE LM.`idMesa`=M.`id` AND A.`id`=M.`codAsignatura`)LM,
                                                                                                              (SELECT ME.`codMesa`, C.`nombre1`, C.`id`
                                                                                                              FROM MESA_EXAMEN_CARRERA ME JOIN CARRERA C
                                                                                                              WHERE ME.`codCarrera`=C.`id` )ME                                                                                              
    WHERE LM.`idLlamado`=L.`id` 
    AND LM.`id` = ME.`codMesa`
    AND  F.`fecha2` IS NOT NULL";

    fputcsv($output, array('id', 'nombre1', 'nombre', 'fecha1', 'fecha2', 'hora'));  
    $reporte1="SELECT * FROM LLAMADO";
    $reporteCsv= BDConexion::getInstancia()->query($reporte);
    while($row = mysqli_fetch_assoc($reporteCsv))  
    {  
         fputcsv($output, $row);  
    }  
    fclose($output);
}

?>