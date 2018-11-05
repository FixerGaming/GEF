<?php
require_once('tcpdf/tcpdf.php');

	class PDF extends TCPDF
	{
		function Header()
		{
			$this->Cell(30);
			$this->Cell(120,10, 'Reporte De Estados',0,0,'C');
			$this->Ln(20);
		}

		function Footer()
		{
			$this->SetY(-15);
			$this->SetFont('Arial','I', 8);
			$this->Cell(0,10, 'Pagina '.$this->PageNo().'/{nb}',0,0,'C' );
		}
	}
?>
