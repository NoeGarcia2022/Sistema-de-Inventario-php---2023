<?php
	require 'fpdf/fpdf.php';
	
	class PDF extends FPDF
	{
		function Header()
		{
			
			$this->SetFont('Arial','B',15);
			$this->Image('images/libreria.jpg', 5, 5, 30 );
			$this->Cell(30);
			$this->Cell(120,10, 'Reporte Cliente',0,0,'C');
			$this->Cell(120,10, 'Libreria y Variedades',0,0,'C');
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