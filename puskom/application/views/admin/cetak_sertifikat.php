<?php
	$pdf = new FPDF('l','mm','A5');

	// membuat halaman baru
    $pdf->AddPage();

    // Arial bold 12
    $pdf->SetFont('Arial','',8);

    $pdf->Cell(40,10,'Hello World !',0,'R');

     $pdf->Output();
?>