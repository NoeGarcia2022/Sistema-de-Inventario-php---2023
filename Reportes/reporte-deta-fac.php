<?php
	include 'plantilla5.php';
	require 'conexion-reporte.php';
	
	$query = "SELECT idfactura, cantidad, idproducto, precio_unitario, ventas_no_sujetas, ventas_exentas, ventas_grabadas  FROM detallefactura";
	$resultado = $mysqli->query($query);
	

	$pdf = new PDF();
	$pdf->AliasNbPages();
	$pdf->AddPage();
	
	$pdf->SetFillColor(232,232,232);
	$pdf->SetFont('Arial','B',10);
	$pdf->Cell(60,6,'ID FACTURA',1,0,'C',1);
	$pdf->Cell(60,6,'CANTIDAD',1,1,'C',1);
    $pdf->Cell(60,6,'ID PRODUCTO',1,1,'C',1);
    $pdf->Cell(60,6,'PRECIO UNITARIO',1,1,'C',1);
    $pdf->Cell(60,6,'VENTA NO SUJETAS',1,1,'C',1);
    $pdf->Cell(60,6,'VENTAS EXENTAS',1,1,'C',1);
    $pdf->Cell(60,6,'VENTAS GRABADAS',1,1,'C',1);


	$pdf->SetFont('Arial','',10);
	
	while($row = $resultado->fetch_assoc())
	{
		
		$pdf->Cell(60,6,$row['idfactura'],1,0,'C');
		$pdf->Cell(60,6,utf8_decode($row['cantidad']),1,1,'C');
        $pdf->Cell(60,6,utf8_decode($row['idproducto']),1,1,'C');
        $pdf->Cell(60,6,utf8_decode($row['precio_unitario']),1,1,'C');
        $pdf->Cell(60,6,utf8_decode($row['ventas_no_sujetas']),1,1,'C');
        $pdf->Cell(60,6,utf8_decode($row['ventas_exentas']),1,1,'C');
        $pdf->Cell(60,6,utf8_decode($row['ventas_grabadas']),1,1,'C');
        
	}
	$pdf->Output();
?>