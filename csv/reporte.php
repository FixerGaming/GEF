<?
//CONEXION A LA BASE DE DATOS
include_once '../modelo/BDConexion.Class.php';

$query= "SELECT A.nombre FROM ASIGNATURA A WHERE A.nombre LIKE 'Arquitectura de las Computadoras' LIMIT 1 ";
$consulta= BDConexion::getInstancia()->query($query);

while($row = $consulta->fetch_assoc()){
    $aux=$row['nombre'];
}
$bug= substr($aux." ",12,1);

$ID=$_POST['llamado'];

if(isset($_POST['reporte'])){
    //nombre del archivo
    header('Content-Type: text/csv; charset=utf-8');  
    header('Content-Disposition: attachment; filename=data.csv');
    //Salida del Archivo
    $output = fopen("php://output", "w");

    //Consulta a la Base de Datos
    $reporte="SELECT C.id, C.nombre AS Carrera, A.nombre AS Asignatura,CONCAT(P.nombre,' ',SUBSTRING(P.apellido,1,1))AS presidente,CONCAT(P1.nombre,' ',SUBSTRING(P1.apellido,1,1)) AS vocal,CONCAT(P2.nombre,' ',SUBSTRING(P2.apellido,1,1)) AS vocal1,CONCAT(P3.nombre,' ',SUBSTRING(P3.apellido,1,1)) AS suplente, DATE_FORMAT(F.fecha1, '%d/%m/%Y') AS fecha1, DATE_FORMAT(F.fecha2, '%d/%m/%Y')AS fecha2, DATE_FORMAT(LM.hora,'%h:%m') AS hora
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
    WHERE F.fecha2 IS NOT NULL
    AND M.orden= F.orden";

    $reporteCsv= BDConexion::getInstancia()->query($reporte);
    while($row = $reporteCsv->fetch_assoc())  
    {  
       /* $Carrera=str_replace($bug, "-", $row['Carrera']);
        $Asignatura=str_replace($bug,"-", $row['Asignatura']);
        $presidente= str_replace($bug,"-", $row['presidente']);
        $vocal=str_replace($bug,"-", $row['vocal']);
        $vocal1=str_replace($bug,"-", $row['vocal1']);
        $suplente=str_replace($bug,"-", $row['suplente']);

         fputcsv($output,     array($row['id'].';'.
                                $Carrera.';'.
                                $Asignatura.';'.
                                $presidente.';'.
                                $vocal.';'.
                                $vocal1.';'.
                                $suplente.';'.
                                $row['fecha1'].';'.
                                $row['fecha2'].';'.
                                $row['hora'].';')); */ 
     fputcsv($output,     array($row['id'].';'.
                                $row['Carrera'].';'.
                                $row['Asignatura'].';'.
                                $row['presidente'].';'.
                                $row['vocal'].';'.
                                $row['vocal1'].';'.
                                $row['suplente'].';'.
                                $row['fecha1'].';'.
                                $row['fecha2'].';'.
                                $row['hora'].';'),';',' '); 
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
    $reporte="SELECT C.id, C.nombre AS Carrera, A.nombre AS Asignatura,CONCAT(P.nombre,' ',SUBSTRING(P.apellido,1,1))AS presidente,CONCAT(P1.nombre,' ',SUBSTRING(P1.apellido,1,1)) AS vocal,CONCAT(P2.nombre,' ',SUBSTRING(P2.apellido,1,1)) AS vocal1,CONCAT(P3.nombre,' ',SUBSTRING(P3.apellido,1,1)) AS suplente, DATE_FORMAT(F.fecha1, '%d/%m/%Y') AS fecha1, DATE_FORMAT(LM.hora,'%h:%m') AS hora
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
    WHERE F.fecha2 IS NULL
    AND M.orden= F.orden
    AND L.id LIKE '%".$ID."%'";

    $reporteCsv= BDConexion::getInstancia()->query($reporte);
    while($row = $reporteCsv->fetch_assoc())  
    {  
        fputcsv($output,     array($row['id'].';'.
        $row['Carrera'].';'.
        $row['Asignatura'].';'.
        $row['presidente'].';'.
        $row['vocal'].';'.
        $row['vocal1'].';'.
        $row['suplente'].';'.
        $row['fecha1'].';'.
        $row['hora'].';'),';',' '); 
    }  
    fclose($output);
}

?>

