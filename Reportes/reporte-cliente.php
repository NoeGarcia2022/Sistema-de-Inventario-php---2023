<?php
	include 'plantilla.php';
	require 'conexion-reporte.php';
	
	$query = "SELECT idcliente, nombre,apellido,nrc,municipio,direccion,telefono,email,	giro,DUI FROM persona";
	$resultado = $mysqli->query($query);
	

	$pdf = new PDF('L' , 'mm', 'Legal');
	$pdf->AliasNbPages();
	$pdf->AddPage();
	
	$pdf->SetFillColor(232,232,232);
	$pdf->SetFont('Arial','B',10);
	$pdf->Cell(20,5,'ID',1,0,'C',1);
	$pdf->Cell(40,5,'NOMBRE',1,0,'C',1);
	$pdf->Cell(40,5,'APELLIDO',1,0,'C',1);
	$pdf->Cell(20,5,'NRC',1,0,'C',1);
    $pdf->Cell(50,5,'MUNICIPIO',1,0,'C',1);
    $pdf->Cell(50,5,'DIRECCION',1,0,'C',1);
    $pdf->Cell(20,5,'TELEFONO',1,0,'C',1);
    $pdf->Cell(50,5,'EMAIL',1,0,'C',1);
    $pdf->Cell(30,5,'GIRO',1,0,'C',1);
    $pdf->Cell(20,5,'DUI',1,0,'C',1);

	$pdf->SetFont('Arial','',10);
	
	while($row = $resultado->fetch_assoc())
	{
		
		$pdf->Ln();
		$pdf->Cell(20,6,utf8_decode($row['idcliente']),1);
		$pdf->Cell(40,6,$row['nombre'],1);
		$pdf->Cell(40,6,utf8_decode($row['apellido']),1);
    	$pdf->Cell(20,6,utf8_decode($row['nrc']),1);
        $pdf->Cell(50,6,utf8_decode($row['municipio']),1);
        $pdf->Cell(50,6,utf8_decode($row['direccion']),1);
        $pdf->Cell(20,6,utf8_decode($row['telefono']),1);
        $pdf->Cell(50,6,utf8_decode($row['email']),1);
        $pdf->Cell(30,6,utf8_decode($row['giro']),1);
        $pdf->Cell(20,6,utf8_decode($row['DUI']),1);
        
	}
	$pdf->Output();
?>