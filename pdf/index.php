<?php
function fetch_data(){
  require_once('conexion/conexion.php');
  $usuario = 'SELECT * FROM ARTICULO';
  $usuarios=$mysqli->query($usuario);
  $output ='';
  while ($datos = mysqli_fetch_array($usuarios)) {
    $output.= '<tr>
                  <td>'.$datos['CODIGO'].'</td>
                  <td>'.$datos[ 'ARTICULO'].'</td>
                  <td>'.$datos[ 'PRECIO'].'</td>
                  <td>'.$datos[ 'STOCK'].'</td>
              </tr>';
  }
  return $output;
}

if(isset($_POST['create_pdf'])){

  require_once('tcpdf/tcpdf.php');

  class MiPDF extends TCPDF{

    public function header()
  	{
  		$this->SetFillColor(253, 135,39);
  		$this->Rect(0,0, 220, 50, 'F');
  		$this->SetY(25);
  		$this->SetFont('Helvetica', 'B', 30);
  		$this->SetTextColor(255,255,255);
  		$this->Write(5, 'Gestor de Examenes Finales (GEF)');

  	}

  	public function footer()
  	{
  		$this->SetFillColor(253, 135,39);
  		$this->Rect(0, 250, 220, 50, 'F');
  		$this->SetY(-20);
  		$this->SetFont('Helvetica', '', 12);
  		$this->SetTextColor(255,255,255);
  		$this->SetX(120);
  		$this->Write(5, 'Gestor de Examenes Finales (GEF)');
  		$this->Ln();
  		$this->SetX(120);
  		$this->Write(5, 'unpa.edu.ar');
  		$this->SetX(120);
  		$this->Ln();
  		$this->SetX(120);
  		$this->Write(5, '+(54)2966-8787');
  	}

  }

$mipdf = new MiPDF();
$mipdf ->addPage();
$mipdf -> Ln(50);

$mipdf->SetMargins(10,30,20,20);
$mipdf->SetFont('Helvetica', '', 9);
$mipdf->SetTextColor(0,0,0);

$content='';
$content.='
    <table align= "center" border="1" cellspacing= "0" cellpadding ="3">
      <tr align="center">
        <th width="10% " >CODIGO</th>
        <th width="50%">ARTICULO</th>
        <th width="15%">PRECIO</th>
        <th width="10% heid">STOCK</th>
      </tr>

';
$content .= fetch_data();
$content .= '</table>';
$mipdf-> writeHTML($content);
$mipdf -> lastPage();
$mipdf -> Output('file.pdf','I');
}
?>


<!doctype html>
<html lang="es">
<head>
<meta charset="utf-8">
<title>Exportar a PDF - Miguel Angel Caro Rojas</title>
<meta name="keywords" content="">
<meta name="description" content="">
<!-- Meta Mobil
================================================== -->
<meta name="viewport" content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
<!-- Bootstrap -->
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
<!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">

<link href="css/bootstrap.min.css" rel="stylesheet">
<link href="css/style.css" rel="stylesheet">

</head>

<body>
	<div class="container-fluid">

        <div class="row padding">
        	<div class="col-md-12">
            	<?php $h1 = "Reporte de Empleados - Enero 2017";
            	 echo '<h1>'.$h1.'</h1>'
				?>
            </div>
        </div>
    	<div class="row">
      <table class="table table-hover">
        <thead class="thead-dark">
          <tr>
            <th scope="col">CODIGO</th>
            <th scope="col">ARTICULO_CODIGO</th>
            <th scope="col">COMPRA_CODIGO</th>
            <th scope="col">CANTIDAD</th>
          </tr>
          <?php
            echo fetch_data();
           ?>
        </thead>
        <tbody>

        </tbody>
      </table>
              <div class="col-md-12">
              	<form method="post">
                	<input type="hidden" name="reporte_name" value="<?php echo $h1; ?>">
                	<input type="submit" name="create_pdf" class="btn btn-outline-danger pull-right" value="Generar PDF">
                </form>
              </div>
      	</div>
    </div>
</body>
</html>
