<?php

include_once '../modelo/BDConexion.Class.php';
$AUX="";
@$IDD=$_POST['id2'];
@$ID=$_POST['id'];
@$Asignatura=$_POST['asignatura'];
@$Docente=$_POST['Docente'];
@$TIPO=$_POST['Tipo'];
$output="";
if(!empty($IDD)){
  $AUX= "AND L.id = '".$IDD."'";
}

if(empty($Asignatura)){
if(empty($Docente)){
    if(empty($ID)){
        $WHERE = "";
    }else{
    $WHERE= "AND C.id = '".$ID."'";
    }
}else{
$WHERE= "AND P.nombre = '".$Docente."'";
}
}else{
$WHERE= "AND A.nombre = '".$Asignatura."'";
}


$reporte="SELECT C.nombre AS Carrera, C.id AS id, A.nombre AS Asignatura, P.nombre AS presidente, P1.nombre AS vocal, P2.nombre AS vocal1, P3.nombre AS suplente, DATE_FORMAT(F.fecha1, '%d/%m/%Y') AS fecha1, DATE_FORMAT(F.fecha2, '%d/%m/%Y')AS fecha2,DATE_FORMAT(LM.fechaUnica, '%d/%m/%Y')AS fechaUnica,DATE_FORMAT(LM.fechaUnica1, '%d/%m/%Y')AS fechaUnica1, DATE_FORMAT(LM.hora,'%h:%m') AS hora
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
  WHERE  M.orden= F.orden
  $AUX
  $WHERE";

$reporteCsv= BDConexion::getInstancia()->query($reporte);

  require_once('tcpdf/tcpdf.php');
  
    $mipdf = new TCPDF('P', 'mm', 'A4', true, 'UTF-8', false);
    $mipdf -> SetTitle("Tabla de Mesas de Examen");
  
    $mipdf->SetHeaderData(PDF_HEADER_LOGO, PDF_HEADER_LOGO_WIDTH, PDF_HEADER_TITLE.' 048', PDF_HEADER_STRING);
    $mipdf->setHeaderFont(Array(PDF_FONT_NAME_MAIN, '', PDF_FONT_SIZE_MAIN));  
    $mipdf->setFooterFont(Array(PDF_FONT_NAME_DATA, '', PDF_FONT_SIZE_DATA));  
    $mipdf->SetDefaultMonospacedFont(PDF_FONT_MONOSPACED);
    $mipdf->SetFooterMargin(PDF_MARGIN_FOOTER);  
    $mipdf->SetMargins(10,10,PDF_MARGIN_TOP, 20);
    
    $mipdf->setPrintHeader(false);  
    $mipdf->setPrintFooter(false);  
    $mipdf->SetAutoPageBreak(TRUE, PDF_MARGIN_BOTTOM);
    $mipdf->SetFont('helvetica', '', 7);  
    $mipdf->AddPage(); 

$content='';
$content.='
    <table align="center" style="margin: auto" border="1" cellspacing= "0" cellpadding ="3">
      <tr>
        <td width="5% " >COD</td>
        <td width="15%">CARRERA</td>
        <td width="15%">ASIGNATURA</td>
        <td width="15% heid">PRESIDENTE</td>
        <td width="10% heid">VOCAL 1</td>
        <td width="10% heid">VOCAL 2</td>
        <td width="10% heid">SUPLENTE</td>
        <td width="10% heid">FECHA 1</td>';
        if(empty(@$TIPO) || @$TIPO == "general"){
$content.=
        '<td width="10% heid">FECHA 2</td>
        <td width="10% heid">HORA</td>';}else{
$content.='<td width="10% heid">HORA</td>';}

$content.='</tr>';

      while($row = $reporteCsv->fetch_assoc()) 
      { 

        $content .=
            '<tr>
            <td>'.$row['id'].'</td>
            <td>'.$row['Carrera'].'</td>
            <td>'.$row['Asignatura'].'</td>
            <td>'.$row['presidente'].'</td>
            <td>'.$row['vocal'].'</td>
            <td>'.$row['vocal1'].'</td>
            <td>'.$row['suplente'].'</td>';
            if($row['fechaUnica'] == NULL){ 
$content.= '<td>'.$row['fecha1'].'</td>';
            }else{
$content.= '<td>'.$row['fechaUnica'].'</td>';
            }
            if(empty(@$TIPO) || @$TIPO == "general"){
              if($row['fechaUnica1'] == NULL){
$content.= '<td>'.$row['fecha2'].'</td>';
              }else{
$content.= '<td>'.$row['fechaUnica1'].'</td>';
              }
$content.='<td>'.$row['hora'].'</td>'; 
              }else{
$content.= '<td>'.$row['hora'].'</td>';
            }
$content.= '</tr>';
      }  
      
$content .= '</table>';
$mipdf -> writeHTML($content, true, 0, true, 0);
$mipdf -> lastPage();
$mipdf -> Output('file.pdf','I');

?>
