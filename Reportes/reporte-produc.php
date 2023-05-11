<?php
	include 'plantilla3.php';
	require 'conexion-reporte.php';
	
	$query = "SELECT idproducto, descripcion, idcategoria, precio_unitario, existencia, total, imagen FROM productos";
	$resultado = $mysqli->query($query);
	

	$pdf = new PDF('L' , 'mm', 'Legal');
	$pdf->AliasNbPages();
	$pdf->AddPage();
	
	$pdf->SetFillColor(232,232,232);
	$pdf->SetFont('Arial','B',10);
	$pdf->Cell(30,6,'ID',1,0,'C',1);
	$pdf->Cell(60,6,'DESCRIPCION',1,0,'C',1);
	$pdf->Cell(30,6,'ID CATEGORIA',1,0,'C',1);
    $pdf->Cell(60,6,'PRECIO UNITARIO',1,0,'C',1);
    $pdf->Cell(60,6,'EXISTENCIA',1,0,'C',1);
    $pdf->Cell(40,6,'TOTAL',1,0,'C',1);
    $pdf->Cell(40,6,'IMAGEN',1,0,'C',1);

	$pdf->SetFont('Arial','',10);
	
	while($row = $resultado->fetch_assoc())
	{
	
		$pdf->Ln();
		$pdf->Cell(30,6,utf8_decode($row['idproducto']),1);
		$pdf->Cell(60,6,$row['descripcion'],1);
		$pdf->Cell(30,6,utf8_decode($row['idcategoria']),1);
        $pdf->Cell(60,6,utf8_decode($row['precio_unitario']),1);
        $pdf->Cell(60,6,utf8_decode($row['existencia']),1);
        $pdf->Cell(40,6,utf8_decode($row['total']),1);
        $pdf->Cell(40,6,utf8_decode($row['imagen']),1);
	}
	$pdf->Output();
?>