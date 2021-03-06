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
    $reporte="SELECT C.id, C.nombre AS Carrera, A.nombre AS Asignatura, P.nombre AS presidente,P1.nombre AS vocal,P2.nombre AS vocal1, P3.nombre AS suplente, DATE_FORMAT(F.fecha1, '%d/%m/%Y') AS fecha1, DATE_FORMAT(F.fecha2, '%d/%m/%Y')AS fecha2, DATE_FORMAT(LM.hora,'%h:%m') AS hora
    FROM MESA_EXAMEN M  INNER JOIN TRIBUNAL T  ON M.idTribunal= T.id
    INNER JOIN PROFESOR P ON T.presidente = P.id
    LEFT JOIN PROFESOR P1 ON  T.vocal = P1.id
    LEFT JOIN PROFESOR P2 ON  T.vocal1 = P2.id
    LEFT JOIN PROFESOR P3 ON T.suplente=P3.id
    INNER JOIN ASIGNATURA A ON A.id= M.codAsignatura
    INNER JOIN MESA_EXAMEN_CARRERA MC ON MC.codMesa=M.id
    INNER JOIN CARRERA C ON MC.codCarrera=C.id
    INNER JOIN  LLAMADO_MESA_EXAMEN LM ON LM.idMesa= M.id
    INNER JOIN LLAMADO L ON L.id = LM.idLlamado
    INNER JOIN FECHA F ON F.LLAMADO_id= L.id";

    $reporteCsv= BDConexion::getInstancia()->query($reporte);
    while($row = $reporteCsv->fetch_assoc())  
    {  
         fputcsv($output,     array($row['id'].';'.
                                $row['Carrera'].':'.
                                $row['Asignatura'].';'.
                                $row['presidente'].';'.
                                $row['vocal'].';'.
                                $row['vocal1'].';'.
                                $row['presidente'].';'.
                                $row['fecha1'].';'.
                                $row['fecha2'].';'.
                                $row['hora'].';'));  
    }  
    fclose($output);
}

if(isset($_POST['reporte1'])){
    //nombre del archivo
    header('Content-Type: text/csv; charset=utf-8');  
    header('Content-Disposition: attachment; filename=data.csv');

    //Salida del Archivo
    $output = fopen("php://output", "w");

    //Consulta a la Base de Datos
    $reporte="SELECT C.id, C.nombre AS Carrera, A.nombre AS Asignatura, P.nombre AS presidente,P1.nombre AS vocal,P2.nombre AS vocal1, P3.nombre AS suplente, F.fecha1, LM.hora
    FROM MESA_EXAMEN M  INNER JOIN TRIBUNAL T  ON M.idTribunal= T.id
    INNER JOIN PROFESOR P ON T.presidente = P.id
    LEFT JOIN PROFESOR P1 ON  T.vocal = P1.id
    LEFT JOIN PROFESOR P2 ON  T.vocal1 = P2.id
    LEFT JOIN PROFESOR P3 ON T.suplente=P3.id
    INNER JOIN ASIGNATURA A ON A.id= M.codAsignatura
    INNER JOIN MESA_EXAMEN_CARRERA MC ON MC.codMesa=M.id
    INNER JOIN CARRERA C ON MC.codCarrera=C.id
    INNER JOIN  LLAMADO_MESA_EXAMEN LM ON LM.idMesa= M.id
    INNER JOIN LLAMADO L ON L.id = LM.idLlamado
    INNER JOIN FECHA F ON F.LLAMADO_id= L.id
    WHERE F.fecha2 IS NULL";
    $reporteCsv= BDConexion::getInstancia()->query($reporte);
    if($reporteCsv->num_rows > 0){
    while($row = $reporteCsv->fetch_assoc())  
    {  
         fputcsv($output, array($row['id'].';'.
                                $row['Carrera'].';'.
                                $row['Asignatura'].';'.
                                $row['presidente'].';'.
                                $row['vocal'].';'.
                                $row['vocal1'].';'.
                                $row['suplente'].';'.
                                $row['fecha1'].';'.
                                $row['hora'].';'));  
    }  
    }
    fclose($output);
}

?>