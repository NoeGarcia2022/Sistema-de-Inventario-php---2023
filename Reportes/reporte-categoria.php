<?php
	include 'plantilla2.php';
	require 'conexion-reporte.php';
	
	$query = "SELECT idcategoria, nom_categoria, descripcion FROM categorias";
	$resultado = $mysqli->query($query);
	

	$pdf = new PDF();
	$pdf->AliasNbPages();
	$pdf->AddPage();
	
	$pdf->SetFillColor(232,232,232);
	$pdf->SetFont('Arial','B',10);
	$pdf->Cell(30,6,'ID CATEGORIA',1,0,'C',1);
	$pdf->Cell(60,6,'NOMBRE CATEGORIA',1,0,'C',1);
	$pdf->Cell(60,6,'DESCRIPCION',1,1,'C',1);
	

	$pdf->SetFont('Arial','',10);
	
	while($row = $resultado->fetch_assoc())
	{
		$pdf->Cell(30,6,utf8_decode($row['idcategoria']),1,0,'C');
		$pdf->Cell(60,6,$row['nom_categoria'],1,0,'C');
		$pdf->Cell(60,6,utf8_decode($row['descripcion']),1,1,'C');
    
        
	}
	$pdf->Output();
?>