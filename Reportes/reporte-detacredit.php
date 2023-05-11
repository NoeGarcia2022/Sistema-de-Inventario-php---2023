<?php
	include 'plantilla7.php';
	require 'conexion-reporte.php';
	
	$query = "SELECT id_detalleCre, cantidad, descripcion, precioUnitario, ventas_exentas, ventas_no_sujetas, ventas_grabadas FROM detallecredito";
	$resultado = $mysqli->query($query);
	

	$pdf = new PDF('L', 'mm', 'A4');
	$pdf->AliasNbPages();
	$pdf->AddPage();
	
	$pdf->SetFillColor(232,232,232);
	$pdf->SetFont('Arial','B',10);
	$pdf->Cell(30,6,'ID DETALLE CRE',1,0,'C',1);
	$pdf->Cell(60,6,'CANTIDAD',1,0,'C',1);
	$pdf->Cell(60,6,'DESCRIPCION',1,1,'C',1);
    $pdf->Cell(60,6,'PRECIO UNITARIO',1,1,'C',1);
    $pdf->Cell(60,6,'VENTAS EXENTAS',1,1,'C',1);
    $pdf->Cell(60,6,'VENTAS NO SUJETAS',1,1,'C',1);
    $pdf->Cell(60,6,'VENTAS GRABADAS',1,1,'C',1);

	$pdf->SetFont('Arial','',10);
	
	while($row = $resultado->fetch_assoc())
	{
		$pdf->Cell(30,6,utf8_decode($row['id_detalleCre']),1,0,'C');
		$pdf->Cell(60,6,$row['cantidad'],1,0,'C');
		$pdf->Cell(60,6,utf8_decode($row['descripcion']),1,1,'C');
        $pdf->Cell(60,6,utf8_decode($row['precioUnitario']),1,1,'C');
        $pdf->Cell(60,6,utf8_decode($row['ventas_exentas']),1,1,'C');
        $pdf->Cell(60,6,utf8_decode($row['ventas_no_sujetas']),1,1,'C');
        $pdf->Cell(60,6,utf8_decode($row['ventas_grabadas']),1,1,'C');
        
	}
	$pdf->Output();
?>