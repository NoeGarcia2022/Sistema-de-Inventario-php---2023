<?php
	include 'plantilla6.php';
	require 'conexion-reporte.php';
	
	$query = "SELECT giro, condiciones_operacion, venta_a_cuenta, numero_remision, fecha_remision, sumas, iva, subtotal, ventas_exenta, venta_no_sujetas, iva_retenido, venta_total FROM comprobante";
	$resultado = $mysqli->query($query);
	

	$pdf = new PDF();
	$pdf->AliasNbPages();
	$pdf->AddPage();
	
	$pdf->SetFillColor(232,232,232);
	$pdf->SetFont('Arial','B',10);
	$pdf->Cell(30,6,'GIRO',1,0,'C',1);
	$pdf->Cell(60,6,'CONDICONES OPERACIONES',1,0,'C',1);
	$pdf->Cell(60,6,'VENTA A CUENTA',1,1,'C',1);
    $pdf->Cell(60,6,'NUMERO REMISION',1,1,'C',1);
    $pdf->Cell(60,6,'FECHA REMISION',1,1,'C',1);
    $pdf->Cell(60,6,'SUMAS',1,1,'C',1);
    $pdf->Cell(60,6,'IVA',1,1,'C',1);
    $pdf->Cell(60,6,'SUBTOTAL',1,1,'C',1);
    $pdf->Cell(60,6,'VENTA EXENTA',1,1,'C',1);
    $pdf->Cell(60,6,'VENTA NO SUJETAS',1,1,'C',1);
    $pdf->Cell(60,6,'IVA RETENIDO',1,1,'C',1);
    $pdf->Cell(60,6,'VENTA TOTAL',1,1,'C',1);


	

	$pdf->SetFont('Arial','',10);
	
	while($row = $resultado->fetch_assoc())
	{
		$pdf->Cell(30,6,utf8_decode($row['giro']),1,0,'C');
		$pdf->Cell(60,6,$row['condiciones_operacion'],1,0,'C');
		$pdf->Cell(60,6,utf8_decode($row['venta_a_cuenta']),1,1,'C');
        $pdf->Cell(60,6,utf8_decode($row['numero_remision']),1,1,'C');
        $pdf->Cell(60,6,utf8_decode($row['fecha_remision']),1,1,'C');
        $pdf->Cell(60,6,utf8_decode($row['venta_a_cuenta']),1,1,'C');
		$pdf->Cell(60,6,utf8_decode($row['sumas']),1,1,'C');
        $pdf->Cell(60,6,utf8_decode($row['iva']),1,1,'C');
		$pdf->Cell(60,6,utf8_decode($row['subtotal']),1,1,'C');
        $pdf->Cell(60,6,utf8_decode($row['ventas_exenta']),1,1,'C');
        $pdf->Cell(60,6,utf8_decode($row['venta_no_sujetas']),1,1,'C');
        $pdf->Cell(60,6,utf8_decode($row['iva_retenido']),1,1,'C');
        $pdf->Cell(60,6,utf8_decode($row['venta_total']),1,1,'C');    
        
	}
	$pdf->Output();
?>