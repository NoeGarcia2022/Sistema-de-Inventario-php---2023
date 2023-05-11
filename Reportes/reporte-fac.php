<?php
	include 'plantilla4.php';
	require 'conexion-reporte.php';
	
	$query = "SELECT idfactura, num_factura, fecha, idcliente, venta_a_cuenta, forma_pago, suma, iva_retenido, subtotal, venta_no_sujeta, venta_exenta, total FROM factura";
	$resultado = $mysqli->query($query);
	

	$pdf = new PDF('L' , 'mm', 'Legal');
	$pdf->AliasNbPages();
	$pdf->AddPage();
	
	$pdf->SetFillColor(232,232,232);
	$pdf->SetFont('Arial','B',10);
	$pdf->Cell(10,6,'ID ',1,0,'C',1);
	$pdf->Cell(40,6,'NUMERO FACTURA',1,0,'C',1);
	$pdf->Cell(30,6,'FECHA',1,0,'C',1);
    $pdf->Cell(20,6,'ID CLIENTE',1,0,'C',1);
    $pdf->Cell(40,6,'VENTA A CUENTA',1,0,'C',1);
    $pdf->Cell(30,6,'FORMA PAGO',1,0,'C',1);
    $pdf->Cell(20,6,'SUMA',1,0,'C',1);
    $pdf->Cell(30,6,'IVA RETENIDO',1,0,'C',1);
    $pdf->Cell(30,6,'SUBTOTAL',1,0,'C',1);
    $pdf->Cell(43,6,'VENTA NO SUJETA',1,0,'C',1);
    $pdf->Cell(30,6,'VENTA EXENTA',1,0,'C',1);
    $pdf->Cell(20,6,'TOTAL',1,0,'C',1);


	$pdf->SetFont('Arial','',10);
	
	while($row = $resultado->fetch_assoc())
	{
		$pdf->Ln();
		$pdf->Cell(10,6,utf8_decode($row['idfactura']),1);
		$pdf->Cell(40,6,$row['num_factura'],1);
		$pdf->Cell(30,6,utf8_decode($row['fecha']),1);
        $pdf->Cell(20,6,utf8_decode($row['idcliente']),1);
        $pdf->Cell(40,6,utf8_decode($row['venta_a_cuenta']),1);
        $pdf->Cell(30,6,utf8_decode($row['forma_pago']),1);
        $pdf->Cell(20,6,utf8_decode($row['suma']),1);
        $pdf->Cell(30,6,utf8_decode($row['iva_retenido']),1);
        $pdf->Cell(30,6,utf8_decode($row['subtotal']),1);
        $pdf->Cell(43,6,utf8_decode($row['venta_no_sujeta']),1);
        $pdf->Cell(30,6,utf8_decode($row['venta_exenta']),1);
        $pdf->Cell(20,6,utf8_decode($row['total']),1);

	}
	$pdf->Output();
?>